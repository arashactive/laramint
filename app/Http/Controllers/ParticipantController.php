<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Term;
use App\Models\User;
use App\utility\modules\terms\TermModule;

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



    public function participantWorkout(Participant $participant)
    {

        $term = $participant->Term;      
        $user = $participant->User;
        return view('contents.learn.mycourses.show', compact([
            'term', 'participant', 'user'
        ]));
    }
}
