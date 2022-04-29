<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Term;
use App\Models\User;
use App\Models\Workout;
use App\utility\modules\tasks\TaskFactory;
use App\utility\modules\terms\TermModule;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{

    public function participantTerms(User $user)
    {

        $terms = new TermModule();
        $terms->User($user);
        $terms->is_mentor = true;

        return view('contents.mentors.learners.profile', compact(
            'user',
            'terms'
        ));
    }


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


    public function deleteParticipantAsTerm(Term $term, User $user)
    {
        $term->Participants()->detach($user);

        return redirect(route('term.show', ['term' => $term->id]))
            ->with('danger', __('successfull deleted'));
    }

    public function reviewWorkout(Term $term, Workout $workout)
    {

        $className = $workout->Sessionable->sessionable_type;

        $task = TaskFactory::Build($className);
        $task->Mentor();
        $task->set_user($workout->User);
        return $task->Render($term, $workout->Sessionable);
    }

    public function participantWorkout(Participant $participant)
    {

        $termModule = new TermModule();
        $termModule->is_mentor = true;

        $term = $termModule->Participant($participant);

        return view('contents.learn.mycourses.show', compact([
            'term', 'participant'
        ]));
    }


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
