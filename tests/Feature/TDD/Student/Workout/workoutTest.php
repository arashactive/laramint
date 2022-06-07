<?php

namespace Tests\Feature\TDD\Student\Workout;

use App\Models\Workout;
use Tests\BaseTest;

class workoutTest extends BaseTest
{

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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_first_term_is_exist()
    {
        $this->student();
        $response = $this->get(route('learningCourse', ['participant' => 3]));

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_first_view_set_record()
    {
        $this->student();
        $response = $this->get(route('taskLearner', [
            'participant' => 3,
            'sessionable' => 1
        ]));
        

        $response->assertStatus(200);

        $this->assertDatabaseHas(
            $this->workout,
            [
                'participant_id' => "3",
                'sessionable_id' => "1",
                'is_completed' => "0"
            ]
        );
    }



    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_first_view_quiz_set_record()
    {
        $this->student();
        $response = $this->get(route('taskLearner', [
            'participant' => 3,
            'sessionable' => 16
        ]));
        

        $response->assertSee('Start');

    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_prepare_quiz_set_record()
    {
        $this->student();
        $response = $this->post(route('taskLearner', [
            'participant' => 3,
            'sessionable' => 16
        ]));
        

        $response->assertRedirect(route('taskLearner', ['participant' => 3, 'sessionable' => 16]));

    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_completed_and_next()
    {
        $this->student();
        $response = $this->get(route('taskLearner', [
            'participant' => 3,
            'sessionable' => 1
        ]));
       

        $response->assertStatus(200);

        $response = $this->get(route('completedAndNext', [
            'workout' => 1
        ]));

        $response->assertRedirect();
    }
}
