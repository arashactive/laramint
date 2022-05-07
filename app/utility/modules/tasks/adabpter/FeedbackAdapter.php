<?php

namespace App\Utility\Modules\Tasks\Adabpter;

use App\Models\Sessionable;
use App\Models\Term;
use App\Utility\Modules\Tasks\Services\TaskParent;
use App\Utility\Workout\WorkoutService;

class FeedbackAdapter extends TaskParent
{
    protected $view = 'contents.learn.feedback.show';
    public $is_mentor = false;


    public function Render(Term $term, Sessionable $sessionable)
    {
        $workout = WorkoutService::WorkOutSyncForThisExcersice($term, $sessionable, $this->user);
        
        $activity = $sessionable->Model;

        return view($this->view, compact([
            'activity', 'workout', 'term'
        ]));
    }

    public function Review()
    {
        return $this->is_mentor;
    }

    public function Mentor()
    {
        $this->is_mentor = true;
    }
}
