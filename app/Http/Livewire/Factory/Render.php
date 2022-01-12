<?php

namespace App\Http\Livewire\Factory;

use App\utility\question\QuestionFactory;
use Livewire\Component;

class Render extends Component
{

    public $questionType = "TestQuestion";
    public $component = '';

    public function selectQuestionType(){
        $this->component = (string)QuestionFactory::build($this->questionType)->getCreateUpdateForm();
    }

    public function render()
    {
        return view('livewire.factory.render');
    }
}
