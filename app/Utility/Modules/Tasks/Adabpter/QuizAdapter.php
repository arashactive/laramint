<?php

namespace App\Utility\Modules\Tasks\Adabpter;

use App\Models\Participant;
use App\Models\Sessionable;
use App\Models\Workout;
use App\Utility\Modules\Tasks\Services\TaskParent;
use App\Utility\Workout\WorkoutService;

class QuizAdapter extends TaskParent
{
    protected string $view = 'contents.learn.quiz.show';
    protected string $review = 'contents.learn.quiz.review';
    protected string $prepare = 'contents.learn.quiz.prepare';

    public $is_mentor = false;


    public function Render(Participant $participant, Sessionable $sessionable)
    {
        $workout = WorkoutService::checkExistWorkout($participant->id, $sessionable, $this->user);
        
        if(empty($workout)){
            $model = $sessionable->Model;
            return view($this->prepare, compact(['participant' , 'model', 'sessionable']));
        }
        
        $activity = $sessionable->Model;

        if (!$this->checkMentorCanBeAccess($workout))
            return redirect()->back()->with('danger', __('for this task, review is not exist.'));

        if ($workout->is_completed || $workout->is_mentor)
            return $this->Review($participant, $workout, $activity);

        

        WorkoutService::setWorkOutQuizSyncForThisExcersice($workout, $sessionable->Model);


        return view($this->view, compact([
            'activity', 'workout', 'participant'
        ]));
    }

    public function Review(Participant $participant, Workout $workout, $activity)
    {
        
        if (!$this->checkMentorCanBeAccess($workout))
            return redirect()->back()->with('danger', __('for this task, review is not exist.'));


        return view($this->review, compact([
            'participant', 'workout', 'activity'
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
