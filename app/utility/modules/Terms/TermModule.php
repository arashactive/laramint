<?php

namespace App\utility\modules\terms;

use App\Models\Participant;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Support\Facades\Auth;

class TermModule
{

    public $is_mentor = false;
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function All()
    {
        return $this->user->Terms;
    }


    public function Participant(Participant $participant)
    {

        $term = $participant->Term;
        $this->user = $participant->User;
        $term->User = $this->user;

        $term->Sessions = $term->Sessions;
        foreach ($term->Sessions as $session) {
            $session->relateds = $this->Relateds($session->related, $term->id);
        }

        return $term;
    }


    

    private function Relateds($relateds, $term_id)
    {
        foreach ($relateds as $related) {
            $related->Model = $related->Model;
            
            $related->Workout = Workout::where('term_id', $term_id)
                ->where('user_id', $this->user->id)
                ->where('sessionable_id', $related->id)
                ->first();    

            if ($this->is_mentor) {
                $related->Route = ($related->Workout) ? route(
                    'reviewWorkout',
                    [
                        'term' => $term_id,
                        'workout' => $related->Workout->id
                    ]
                ) : '';
            } else {
                $related->Route = route(
                    'taskLearner',
                    [
                        'term' => $term_id,
                        'sessionable' => $related->id
                    ]
                );
            }
        }

        return $relateds;
    }


    public function User(User $user)
    {
        $this->user = $user;
    }
}
