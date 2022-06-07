<?php

namespace Tests\Feature\TDD\Student\Quiz;

use App\Models\Participant;
use App\Models\Sessionable;
use App\Models\User;
use App\Utility\Workout\WorkoutService;

trait QuizTrait{

    private function setWorkoutForQuiz(){
        $user = User::findorfail($this->student_id);
        $participant = Participant::findorfail($this->participant);
        $sessionable = Sessionable::findorfail($this->sessionable);
        $workout = WorkoutService::WorkOutSyncForThisExcersice($participant, $sessionable, $user);

        WorkoutService::setWorkOutQuizSyncForThisExcersice($workout, $sessionable->Model);
    }
}