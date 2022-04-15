<?php

namespace App\Http\Livewire\Factory;

use App\utility\question\QuestionFactory;
use Livewire\Component;
use App\Models\QuestionType;

class Render extends Component
{

    public $questionTypeId;
    public $component = '';
    public $question;
    public $quiz = null;

    public function mount(){
        $this->questionTypeId = QuestionType::first()->id;
        
        if($this->question){
            $this->questionTypeId = $this->question->question_type_id;
            
            $this->getComponent($this->questionTypeId);
        }
    }


    private function getComponent($questionTypeId){
        $questionType = QuestionType::find($questionTypeId);
        $this->component = (string)QuestionFactory::build($questionType)->getCreateUpdateForm();
    }

    public function selectQuestionType(){
        $this->getComponent($this->questionTypeId);
    }

    public function render()
    {
        $questionTypes = QuestionType::all();
        return view('livewire.factory.render', compact("questionTypes"));
    }
}
