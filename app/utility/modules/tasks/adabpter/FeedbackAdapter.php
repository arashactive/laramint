<?php

namespace App\utility\modules\tasks\adabpter;

use App\Models\Sessionable;
use App\Models\Term;
use App\Models\User;
use App\utility\modules\tasks\contract\TaskInterface;
use App\utility\modules\tasks\services\TaskParent;
use App\utility\workout\WorkoutService;

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
