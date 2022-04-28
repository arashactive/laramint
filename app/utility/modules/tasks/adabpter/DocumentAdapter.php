<?php

namespace App\utility\modules\tasks\adabpter;

use App\Models\Sessionable;
use App\Models\Term;
use App\Models\User;
use App\Models\Workout;
use App\utility\modules\tasks\services\TaskParent;
use App\utility\workout\WorkoutService;

class DocumentAdapter extends TaskParent
{
    protected $view = 'contents.learn.documents.show';
    public $is_mentor = false;


    public function Render(Term $term, Sessionable $sessionable)
    {
        
        $workout = WorkoutService::WorkOutSyncForThisExcersice($term, $sessionable, $this->user);
        
        $activity = $sessionable->Model;

        $review = $this->Review($term, $workout);

        return view($this->view, compact([
            'activity', 'workout', 'term', 'review'
        ]));
    }

    public function Review(Term $term, Workout $workout)
    {
        if($workout->is_completed == 1){
            return true;
        }

        return false;
    }

    public function Mentor()
    {
        $this->is_mentor = true;
    }
}
