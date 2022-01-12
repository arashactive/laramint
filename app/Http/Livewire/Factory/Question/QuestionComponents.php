<?php

namespace App\Http\Livewire\Factory\Question;

use Livewire\Component;
use App\utility\question\QuestionFactory;

class QuestionComponents extends Component
{
    public $title, $question_body, $questionTypeId;
    public $question;
    public $answers = ['' , '' , '' , ''];
    public $correctAnswer = [];


    public function addNewAnswer(){
        $this->answers[] = '';
    }


    public function removeAnswer($index){
        unset($this->answers[$index]);
        $this->answers = array_values($this->answers);
    }


    public function store(){
        
        $question = QuestionFactory::build($this->questionTypeId)->store([
                'id' => $this->question->id ?? null
        ], [
            'title' => $this->title,
            'question_body' => $this->question_body,
            'answer' => $this->makeAnswerJson(),
            'question_type_id' => $this->questionTypeId
        ]);
    }

    protected function makeAnswerJson(){
        return json_encode([
            'answers' => $this->answers,
            'correctAnswer' => $this->correctAnswer,
        ]);
    }

    protected function fetchAnswerJson(){
        
        $this->answers = json_decode($this->question->answer)->answers ?? []; 
        $this->correctAnswer = json_decode($this->question->answer)->correctAnswer ?? []; 
    }

    protected function setValueWithQuestion(){
        $this->title = $this->question->title;
        $this->question_body = $this->question->question_body;
        $this->questionTypeId = $this->question->question_type_id;
        $this->fetchAnswerJson();
    }

}