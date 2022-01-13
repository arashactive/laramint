<?php

namespace App\Http\Livewire\Factory\Question\TrueFalseQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;

class Create extends QuestionComponents
{

    public function mount(){
        $this->answers = ['true' , 'false'];
        if($this->question){
            $this->setValueWithQuestion();
        }

    }

    public function render()
    {
        return view('livewire.factory.question.true-false-question.create');
    }
}
