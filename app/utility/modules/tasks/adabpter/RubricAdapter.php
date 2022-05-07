<?php

namespace App\Utility\Modules\Tasks\Adabpter;

use App\Models\Sessionable;
use App\Models\Term;
use App\Models\Workout;
use App\utility\Modules\Tasks\Services\TaskParent;
use App\Utility\Workout\WorkoutService;

class RubricAdapter extends TaskParent
{
    protected $view = 'contents.learn.rubric.show';
    public $is_mentor = false;


    public function Render(Term $term, Sessionable $sessionable)
    {
        $workout = WorkoutService::WorkOutSyncForThisExcersice($term,  $sessionable, $this->user);

        $activity = $sessionable->Model;
        $review = $this->Review($term, $workout);
        return view($this->view, compact([
            'activity', 'workout', 'review'
        ]));
    }

    public function Review(Term $term, Workout $workout)
    {
        if ($workout->is_completed == 1) {
            return true;
        }

        return false;
    }

    public function Mentor()
    {
        $this->is_mentor = true;
    }
}
