<?php

namespace App\Http\Livewire\Factory\Question\TestQuestion;

use Livewire\Component;

class Create extends Component
{

    public $title, $description;
    public $answers = ['' , '' , '' , ''];

    public function addNewAnswer(){
        $this->answers[] = '';
    }


    public function removeAnswer($index){
        unset($this->answers[$index]);
        $this->answers = array_values($this->answers);
    }

    public function render()
    {
        return view('livewire.factory.question.test-question.create');
    }
}
