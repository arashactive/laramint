<?php

namespace App\Http\Livewire\Factory\Question;

use App\Models\QuestionType;
use Livewire\Component;
use App\Utility\Question\QuestionFactory;


class QuestionComponents extends Component
{
    public $title, $question_body, $questionTypeId;
    public $question;
    public $answers;
    public $correctAnswer = [];
    public $quiz = null;


    public function addNewAnswer()
    {
        $this->answers[] = '';
    }


    public function removeAnswer($index)
    {
        unset($this->answers[$index]);
        $this->answers = array_values($this->answers);
    }


    public function store()
    {
        $questionType = QuestionType::findorfail($this->questionTypeId);
        QuestionFactory::build($questionType)
            ->setQuizId($this->quiz->id ?? 0)
            ->store([
                'id' => $this->question->id ?? 0
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

    protected function makeAnswerJson()
    {
        return json_encode([
            'answers' => $this->answers,
            'correctAnswer' => $this->correctAnswer,
        ]);
    }

    protected function fetchAnswerJson()
    {

        $this->answers = json_decode($this->question->answer)->answers ?? [];
        $this->correctAnswer = json_decode($this->question->answer)->correctAnswer ?? [];
    }

    protected function setValueWithQuestion()
    {
        $this->title = $this->question->title;
        $this->question_body = $this->question->question_body;
        $this->questionTypeId = $this->question->question_type_id;
        $this->fetchAnswerJson();
    }
}
