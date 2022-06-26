<?php

namespace App\Utility\Modules\Tasks\Adabpter;

use App\Models\Participant;
use App\Models\Sessionable;
use App\Models\Term;
use App\Utility\Modules\Tasks\Services\TaskParent;
use App\Utility\Workout\WorkoutService;

class FeedbackAdapter extends TaskParent
{
    protected string $view = 'contents.learn.feedback.show';
    public bool $is_mentor = false;


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function Render(Participant $participant, Sessionable $sessionable)
    {
        $workout = WorkoutService::WorkOutSyncForThisExcersice($participant, $sessionable, $this->user);
        
        $activity = $sessionable->Model;

        return view($this->view, compact([
            'activity', 'workout', 'participant'
        ]));
    }

    public function Review(): bool
    {
        return $this->is_mentor;
    }

    public function Mentor(): void
    {
        $this->is_mentor = true;
    }
}
