<?php

namespace Tests\Feature\TDD\Student\Quiz;

use App\Models\Sessionable;
use App\Models\Term;
use App\Models\User;
use App\Utility\Workout\WorkoutService;

trait QuizTrait{

    private function setWorkoutForQuiz(){
        $user = User::findorfail($this->student_id);
        $term = Term::findorfail($this->term);
        $sessionable = Sessionable::findorfail($this->sessionable);
        $workout = WorkoutService::WorkOutSyncForThisExcersice($term, $sessionable, $user);

        WorkoutService::setWorkOutQuizSyncForThisExcersice($workout, $sessionable->Model);
    }
}