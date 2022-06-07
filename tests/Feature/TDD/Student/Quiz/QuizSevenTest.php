<?php

namespace Tests\Feature\TDD\Student\Quiz;

use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use Illuminate\Support\Facades\Storage;
use Tests\BaseTest;

class QuizSevenTest extends BaseTest
{
    use QuizTrait;
    private $student_id = 8;
    protected $participant = 3;
    private $sessionable = 22;


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
            'question_id' => 19,
            'workout_id' => 1,
            'answer-19-0' => 0,
            'answer-19-1' => 1,
            'answer-19-2' => 2,
            'answer-19-3' => 3,
            'is_mentor' => 0
        ];
        $this->postRequestCheckCorrectAndExist($value);


        Storage::fake('avatars');

        $value = [
            'question_id' => 1,
            'workout_id' => 1,
            'answer-1' => 1,
            'is_mentor' => 0
        ];

        $this->postRequestCheckCorrectAndExist($value);


        $this->assertDatabaseHas(Workout::class, [
            'participant_id' => $this->participant,
            'sessionable_id' => $this->sessionable,
            'is_completed' => 1,
            'is_mentor' => 0
        ]);
    }

    private function postRequestCheckCorrectAndExist($value)
    {
        $response = $this->post(
            route('quizWorkout'),
            $value
        );

        $response->assertStatus(200);

        $this->assertDatabaseHas(WorkoutQuizLog::class, [
            'question_id' => $value['question_id'],
            'is_mentor' => $value['is_mentor'],
            'workout_id' => $value['workout_id']
        ]);
    }
}
