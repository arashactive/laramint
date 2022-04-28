<?php

namespace App\utility\modules\tasks\adabpter;

use App\Models\Sessionable;
use App\Models\Term;
use App\utility\modules\tasks\contract\TaskInterface;
use App\utility\workout\WorkoutService;
use Illuminate\Support\Facades\Auth;

class QuizAdapter implements TaskInterface
{
    protected $view = 'contents.learn.quiz.show';
    public $is_mentor = false;


    public function Render(Term $term, Sessionable $sessionable)
    {
        $user = Auth::user();
        
        $workout = WorkoutService::WorkOutSyncForThisExcersice($term, $sessionable, $user);
        WorkoutService::setWorkOutQuizSyncForThisExcersice($workout, $sessionable->Model);
        
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
