<?php

namespace App\utility\modules\tasks\adabpter;

use App\Models\Sessionable;
use App\Models\Term;
use App\Models\User;
use App\Models\Workout;
use App\utility\modules\tasks\services\TaskParent;
use App\utility\workout\WorkoutService;

class QuizAdapter extends TaskParent
{
    protected $view = 'contents.learn.quiz.show';
    protected $review = 'contents.learn.quiz.review';

    public $is_mentor = false;


    public function Render(Term $term, Sessionable $sessionable)
    {
    
        $workout = WorkoutService::WorkOutSyncForThisExcersice($term, $sessionable, $this->user);

        $activity = $sessionable->Model;
        
        if ($workout->is_completed)
            return $this->Review($term, $workout, $activity);

        WorkoutService::setWorkOutQuizSyncForThisExcersice($workout, $sessionable->Model);


        return view($this->view, compact([
            'activity', 'workout', 'term'
        ]));
    }

    public function Review(Term $term, Workout $workout, $activity)
    {
        if (!$workout->is_completed)
            return redirect()->back()->with('msg-danger', __('for this task, review is not exist.'));

        return view($this->review, compact([
            'term', 'workout', 'activity'
        ]));
    }

    public function Mentor()
    {
        $this->is_mentor = true;
    }
}
