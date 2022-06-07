<?php

namespace Tests\Feature\TDD\Student\Quiz;

use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use Tests\BaseTest;

class ShortAnswerTest extends BaseTest
{
    use QuizTrait;
    private $student_id = 8;
    private $participant = 3;
    private $sessionable = 20;


    public function student()
    {
        $this->signIn($this->student_id);
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
    public function test_quiz_testing_questions_render()
    {
        $this->student();

        $this->setWorkoutForQuiz();
        
        $response = $this->get(route('taskLearner', [
            'participant' => $this->participant,
            'sessionable' => $this->sessionable
        ]));

        $response->assertStatus(200);
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_quiz_with_test()
    {
        $this->withoutExceptionHandling();

        $this->test_quiz_testing_questions_render();

        $value = [
            'question_id' => 13,
            'workout_id' => 1,
            'answer' => "Yes, It doesn't here."
        ];
        $this->postRequestCheckCorrectAndExist($value);

        $value = [
            'question_id' => 14,
            'workout_id' => 1,
            'answer' => "Yes, It's here."
        ];
        $this->postRequestCheckCorrectAndExist($value);

        $value = [
            'question_id' => 15,
            'workout_id' => 1,
            'answer' => "Yes, It's here."
        ];
        $this->postRequestCheckCorrectAndExist($value);


        $this->assertDatabaseHas(Workout::class, [
            'participant_id' => $this->participant,
            'sessionable_id' => $this->sessionable,
            'is_completed' => 0,
            'is_mentor' => 1
        ]);
    }

    private function postRequestCheckCorrectAndExist($value)
    {
        $response = $this->post(route(
            'quizWorkout',
            [
                'question_id' => $value['question_id'],
                'workout_id' => $value['workout_id'],
                'answer-' . $value['question_id'] => $value['answer']
            ]
        ));

        $response->assertStatus(200);

        $this->assertDatabaseHas(WorkoutQuizLog::class, [
            'question_id' => $value['question_id'],
            'is_mentor' => 1,
            'workout_id' => $value['workout_id']
        ]);
    }
}
