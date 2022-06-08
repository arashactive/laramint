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
