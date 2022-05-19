<?php

namespace Tests\Feature\TDD;

use App\Http\Livewire\Factory\Question\EssayQuestion\Create as EssayQuestionCreate;
use App\Http\Livewire\Factory\Question\MatchingCaseQuestion\Create as MatchingCaseQuestionCreate;
use App\Http\Livewire\Factory\Question\MultipleQuestion\Create as MultipleQuestionCreate;
use App\Http\Livewire\Factory\Question\ShortAnswerQuestion\Create as ShortAnswerQuestionCreate;
use App\Http\Livewire\Factory\Question\TestQuestion\Create;
use App\Http\Livewire\Factory\Question\TrueFalseQuestion\Create as TrueFalseQuestionCreate;
use App\Http\Livewire\Factory\Question\UploadFileQuestion\Create as UploadFileQuestionCreate;
use App\Models\Question;
use Livewire\Livewire;
use Tests\BaseTest;

class QuestionTest extends BaseTest
{
    private $route = 'question';
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute($this->route);
        $this->setBaseModel('App\Models\Question');
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_index_form()
    {
        $this->signIn();

        $response = $this->get(route($this->route . '.index'));
        $response->assertStatus(200);
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form()
    {
        $this->signIn();

        $response = $this->get(route($this->route . '.create'));
        $response->assertStatus(200);
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form_test_question_type()
    {
        $this->signIn();

        Livewire::test(Create::class)
            ->set('title', 'test A1')
            ->set('question_body', 'test A1 question')
            ->set('questionTypeId', 1)
            ->set('answers', ["Minus est sed et con", "Quo proident in ips", "Accusamus nostrum cu", "Ipsum quia minim est"])
            ->set('correctAnswer', 0)
            ->call('store');

        $this->assertTrue(Question::whereTitle('test A1')->exists());
    }


    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form_true_false_question_type()
    {
        $this->signIn();

        Livewire::test(TrueFalseQuestionCreate::class)
            ->set('title', 'true false A1')
            ->set('question_body', 'true false A1 question')
            ->set('questionTypeId', 2)
            ->set('answers', ['Answer1', 'answer2'])
            ->set('correctAnswer', 0)
            ->call('store');

        $this->assertTrue(Question::whereTitle('true false A1')->exists());
    }



    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form_multiple_question_type()
    {
        $this->signIn();

        Livewire::test(MultipleQuestionCreate::class)
            ->set('title', 'multiple A1')
            ->set('question_body', 'multiple A1 question')
            ->set('questionTypeId', 3)
            ->set('answers', ["Answer 1", "Answer 2", "Answer 3", "Answer 4"])
            ->set('correctAnswer', ['answer-0', false, false, 'answer-3'])
            ->call('store');

        $this->assertTrue(Question::whereTitle('multiple A1')->exists());
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form_essay_question_type()
    {
        $this->signIn();

        Livewire::test(EssayQuestionCreate::class)
            ->set('title', 'essay A1')
            ->set('question_body', 'essay A1 question')
            ->set('questionTypeId', 4)
            ->set('answers', ["min" => "0", "max" => "500"])
            ->set('correctAnswer', [])
            ->call('store');

        $this->assertTrue(Question::whereTitle('essay A1')->exists());
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form_upload_question_type()
    {
        $this->signIn();

        Livewire::test(UploadFileQuestionCreate::class)
            ->set('title', 'upload A1')
            ->set('question_body', 'upload A1 question')
            ->set('questionTypeId', 5)
            ->set('answers', ["max_size" => 1024, "min_size" => 128, "file_type" => "pdf,word,excel,images"])
            ->set('correctAnswer', [])
            ->call('store');

        $this->assertTrue(Question::whereTitle('upload A1')->exists());
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form_short_answer_question_type()
    {
        $this->signIn();

        Livewire::test(ShortAnswerQuestionCreate::class)
            ->set('title', 'shortanswer A1')
            ->set('question_body', 'upload A1 question')
            ->set('questionTypeId', 6)
            ->set('answers', ['laravel', 'test', 'php'])
            ->set('correctAnswer', [])
            ->call('store');

        $this->assertTrue(Question::whereTitle('shortanswer A1')->exists());
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form_matching_case_question_type()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        Livewire::test(MatchingCaseQuestionCreate::class)
            ->set('title', 'matching A1')
            ->set('question_body', 'upload A1 question')
            ->set('questionTypeId', 7)
            ->set('answers', [
                ["left" => "Aut est labore sit s", "right" => "Impedit commodo ver"],
                ["left" => "Maxime delectus per", "right" => "Voluptatem tenetur n"],
                ["left" => "Veritatis laboriosam", "right" => "Vitae laborum aut qu"]
            ])
            ->set('correctAnswer', [])
            ->call('store');

        $this->assertTrue(Question::whereTitle('matching A1')->exists());
    }
}
