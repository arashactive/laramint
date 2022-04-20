<?php

namespace Tests\Feature\TDD\Student\Quiz;

use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\BaseTest;

class QuizSevenTest extends BaseTest
{

    private $student_id = 8;
    private $term = 1;
    private $activity = 7;
    private $session = 3;
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
        $response = $this->get(route('quizLearner', [
            'term' => $this->term,
            'activity' => $this->activity,
            'session' => $this->session,
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

        // $value = [
        //     'question_id' => 20,
        //     'workout_id' => 1,
        //     'answer' => "Yes, It's here.",
        //     'is_mentor' => 1
        // ];
        // $this->postRequestCheckCorrectAndExist($value);

        Storage::fake('avatars');

        $value = [
            'question_id' => 1,
            'workout_id' => 1,
            'answer-1' => 1,
            'is_mentor' => 0
        ];

        $this->postRequestCheckCorrectAndExist($value);


        $this->assertDatabaseHas(Workout::class, [
            'user_id' => $this->student_id,
            'term_id' => $this->term,
            'activity_id' => $this->activity,
            'session_id' => $this->session,
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
