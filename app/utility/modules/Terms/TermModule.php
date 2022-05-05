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

        return $this->user->Terms()->wherePivot('role_id', 4)->get();
    }


    public function Participant(Participant $participant)
    {

        $term = $participant->Term;

        $this->user = $participant->User;
        $term->User = $this->user;

        $term->Sessions = $term->Sessions;
        foreach ($term->Sessions as $session) {
            $session->relateds = $this->Relateds($session->related, $term->id);
            $session->info = $this->info($session);
        }

        return $term;
    }

    private function Info($session)
    {

        $info = [
            'total' => count($session->Sessionable),
            'workout' => $session->relateds->Info['workout'],
            'duration' => $session->relateds->Info['duration'],
            'score' =>  $session->relateds->Info['workout'] > 0 ? (int)$session->relateds->Info['score'] / $session->relateds->Info['workout'] : 0
        ];

        return $info;
    }


    private function Relateds($relateds, $term_id)
    {

        $videos = [
            'total' => 0,
            'checked' => 0
        ];

        $tasks = [
            'total' => 0,
            'checked' => 0
        ];

        $relateds->Info = [
            'workout' => 0,
            'score' => 0,
            'duration' => [
                'videos' => $videos,
                'tasks' => $tasks
            ]
        ];
        foreach ($relateds as $related) {

            $related->Model = $related->Model;

            $related->Workout = Workout::where('term_id', $term_id)
                ->where('user_id', $this->user->id)
                ->where('sessionable_id', $related->id)
                ->first();

            if (isset($related->Workout->is_completed)) {
                $relateds->Info['workout'] += $related->Workout->is_completed;
                $relateds->Info['score'] += $related->Workout->score;
            }

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
