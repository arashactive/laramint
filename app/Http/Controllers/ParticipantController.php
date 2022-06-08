<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Term;
use App\Models\User;
use App\Models\Workout;
use App\Utility\Modules\Tasks\TaskFactory;
use App\Utility\Modules\Terms\ParticipantInfoGenerator;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{

    /**
     * get all term for this user
     *
     * @param  User  $user
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function participantTerms(User $user)
    {
        $terms = ParticipantInfoGenerator::getAllTermsForParticipant($user, true);

        $lastActivities = ParticipantInfoGenerator::getLastActivityForUser($user);


        return view('contents.mentors.learners.profile', compact(
            'user',
            'terms',
            'lastActivities'
        ));
    }


    /**
     * Add user to especific term with dynamic role
     *
     * @param  int  $term_id
     * @param  int  $user_id
     * @param  int  $role_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addParticipantToTerm($term_id, $user_id, $role_id)
    {

        $participantCount = Participant::where('term_id', $term_id)
            ->where('user_id', $user_id)
            ->where('role_id', $role_id)
            ->count();

        if ($participantCount > 0)
            return redirect(route('term.show', ['term' => $term_id]))
                ->with('danger', 'user is exist');

        Participant::create([
            'term_id' => $term_id,
            'user_id' => $user_id,
            'role_id' => $role_id,
        ]);

        // Mail::to(User::findorfail(1))->queue(new ParticipantAddToTerm());

        return redirect(route('term.show', ['term' => $term_id]))
            ->with('success', __('successfull added'));
    }

    /**
     * delete user to especific term with dynamic role
     *
     * @param  Term  $term
     * @param  User  $user
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteParticipantAsTerm(Term $term, User $user)
    {
        $term->Participants()->detach($user);

        return redirect(route('term.show', ['term' => $term->id]))
            ->with('danger', __('successfull deleted'));
    }

    /**
     * review of term and workout of especific user
     *
     * @param  Participant  $participant
     * @param  Workout  $workout
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function reviewWorkout(Participant $participant, Workout $workout)
    {

        $className = $workout->Sessionable->sessionable_type;

        $task = TaskFactory::Build($className);
        $task->Mentor();
        $task->set_user($workout->User);
        return $task->Render($participant, $workout->Sessionable);
    }

    /**
     * participantWorkout
     *
     * @param  Participant  $participant
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function participantWorkout(Participant $participant)
    {

        $participant = ParticipantInfoGenerator::getTermStatistic($participant);
        
        return view('contents.learn.mycourses.show', compact([
            'participant'
        ]));
    }


    /**
     * reviewWorkoutUpdate
     *
     * @param  Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function reviewWorkoutUpdate(Request $request)
    {
        $request->validate([
            'workout_id' => 'required|int',
            'score' => 'required|int|min:0|max:100',
            'is_completed' => 'required|boolean'
        ]);

        $workout = Workout::findorfail($request->workout_id);
        $workout->score = $request->score;
        $workout->is_completed = $request->is_completed;

        $workout->save();

        return redirect()->back()->with('msg-success', 'success');
    }
}
