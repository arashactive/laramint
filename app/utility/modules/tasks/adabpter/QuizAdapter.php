<?php

namespace App\Utility\Modules\Tasks\Adabpter;

use App\Models\Sessionable;
use App\Models\Term;
use App\Models\Workout;
use App\Utility\Modules\Tasks\Services\TaskParent;
use App\Utility\Workout\WorkoutService;

class QuizAdapter extends TaskParent
{
    protected $view = 'contents.learn.quiz.show';
    protected $review = 'contents.learn.quiz.review';

    public $is_mentor = false;


    public function Render(Term $term, Sessionable $sessionable)
    {

        $workout = WorkoutService::WorkOutSyncForThisExcersice($term, $sessionable, $this->user);

        $activity = $sessionable->Model;

        if (!$this->checkMentorCanBeAccess($workout))
            return redirect()->back()->with('danger', __('for this task, review is not exist.'));

        if ($workout->is_completed)
            return $this->Review($term, $workout, $activity);

        WorkoutService::setWorkOutQuizSyncForThisExcersice($workout, $sessionable->Model);


        return view($this->view, compact([
            'activity', 'workout', 'term'
        ]));
    }

    public function Review(Term $term, Workout $workout, $activity)
    {
        if (!$this->checkMentorCanBeAccess($workout))
            return redirect()->back()->with('danger', __('for this task, review is not exist.'));


        return view($this->review, compact([
            'term', 'workout', 'activity'
        ]));
    }

    public function Mentor()
    {
        $this->is_mentor = true;
    }


    private function checkMentorCanBeAccess($workout, $is_mentor = null)
    {
        $is_mentor = $is_mentor ?: $this->is_mentor;

        if ($is_mentor && !$workout->is_completed) {
            return false;
        }

        return true;
    }
}
