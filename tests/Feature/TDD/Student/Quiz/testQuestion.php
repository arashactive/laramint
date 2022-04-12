<?php

namespace Tests\Feature\TDD\Student\Quiz;

use Tests\BaseTest;

class testQuestion extends BaseTest
{
    private $question = 'App\Models\Question';
    private $quiz = 'App\Models\Quiz';
    private $workout = 'App\Models\Workout';
    private $workoutQuiz = 'App\Models\WorkoutQuizLog';


    public function student(){
        $this->signIn(8);
    }

    protected function setUp(): void
    {

        parent::setUp();
        $this->seed();
    }


}
