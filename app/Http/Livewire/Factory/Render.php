<?php

namespace App\Http\Livewire\Factory;

use App\utility\question\QuestionFactory;
use Livewire\Component;
use App\Models\questionType;

class Render extends Component
{

    public $questionTypeId;
    public $component = '';
    public $question;

    public function mount(){
        $this->questionTypeId = questionType::first()->id;
        
        if($this->question){
            $this->questionTypeId = $this->question->question_type_id;
            $this->getComponent($this->questionTypeId);
        }
    }


    private function getComponent($questionTypeId){
        $this->component = (string)QuestionFactory::build($questionTypeId)->getCreateUpdateForm();
    }

    public function selectQuestionType(){
        $this->getComponent($this->questionTypeId);
    }

    public function render()
    {
        $questionTypes = questionType::all();
        return view('livewire.factory.render', compact("questionTypes"));
    }
}
