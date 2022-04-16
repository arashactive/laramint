<?php

namespace Tests\Feature\TDD\Student\Quiz;

use Tests\BaseTest;

class LearnerQuestionWorkoutTest extends BaseTest
{


    public function student(){
        $this->signIn(8);
    }

    protected function setUp(): void
    {

        parent::setUp();
        $this->seed();
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_quiz_testing_questions_render(){
        $this->student();
        $response = $this->get(route('quizLearner', [
            'term' => 1,
            'activity' => 3,
            'session' => 1,
            'sessionable' => 16
        
        ]));

        $response->assertStatus(200);
    }


    


}
