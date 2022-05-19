<?php

namespace App\Http\Livewire\Factory\Question;

use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Quiz;
use Livewire\Component;
use App\Utility\Question\QuestionFactory;


class QuestionComponents extends Component
{
    public string $title = '';
    public string $question_body = '';
    public int $questionTypeId = 0;
    public ?Question $question = null;
    public array $answers;
    public  $correctAnswer = [];
    public ?Quiz $quiz = null;


    /**
     * addNewAnswer
     *
     * @return void
     */
    public function addNewAnswer()
    {
        $this->answers[] = '';
    }


    /**
     * removeAnswer
     *
     * @param  int $index
     * @return void
     */
    public function removeAnswer($index)
    {
        unset($this->answers[$index]);
        $this->answers = array_values($this->answers);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $questionType = QuestionType::findorfail($this->questionTypeId);

        $questionObject = QuestionFactory::build($questionType);
        $questionObject->setQuizId($this->quiz->id ?? 0);
        $questionObject->store([
            'id' => isset($this->question->id) ? $this->question->id  : null
        ], [
            'title' => $this->title,
            'question_body' => $this->question_body,
            'answer' => $this->makeAnswerJson(),
            'question_type_id' => $this->questionTypeId
        ]);

        if (isset($this->quiz->id)) {
            return redirect()->to(route('quiz.show', $this->quiz->id));
        } else {
            return redirect()->to(route('question.index'));
        }
    }

    /**
     * Convert the array instance to JSON.
     *
     * @return array|string|bool
     */
    protected function makeAnswerJson()
    {
        return json_encode([
            'answers' => $this->answers,
            'correctAnswer' => $this->correctAnswer,
        ]);
    }


    /**
     * fetchAnswerJson
     *
     * @return void
     */
    protected function fetchAnswerJson()
    {

        $this->answers = json_decode($this->question->answer)->answers ?? [];
        $this->correctAnswer = json_decode($this->question->answer)->correctAnswer ?? [];
    }


    /**
     * setValueWithQuestion
     *
     * @return void
     */
    protected function setValueWithQuestion()
    {
        $this->title = $this->question->title;
        $this->question_body = $this->question->question_body;
        $this->questionTypeId = $this->question->question_type_id;
        $this->fetchAnswerJson();
    }
}
