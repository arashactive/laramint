<?php

namespace App\Http\Livewire\Factory\Question\MatchingCaseQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;

class Create extends QuestionComponents
{

    public function mount(){
        $this->answers = [
            ['left' => '' , 'right' => '']
        ];
        if($this->question){
            $this->setValueWithQuestion();
        }

    }

    public function addNewAnswer(){
        $this->answers[] = ['left' => '' , 'right' => ''];
    }


    public function render()
    {
        return view('livewire.factory.question.matching-case-question.create');
    }
}
