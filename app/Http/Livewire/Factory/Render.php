<?php

namespace App\Http\Livewire\Factory;

use App\Models\Question;
use App\Utility\Question\QuestionFactory;
use Livewire\Component;
use App\Models\QuestionType;

class Render extends Component
{

    public ?int $questionTypeId;
    public string $component = '';
    public ?Question $question;
    public $quiz = null;

    public function mount(): void
    {
        $this->questionTypeId = QuestionType::first()->id;

        if (!empty($this->question)) {
            $this->questionTypeId = $this->question->question_type_id;

            $this->getComponent($this->questionTypeId);
        }
    }


    private function getComponent($questionTypeId): void
    {
        $questionType = QuestionType::find($questionTypeId);
        $this->component = (string)QuestionFactory::build($questionType)->getCreateUpdateForm();
    }

    public function selectQuestionType(): void
    {
        $this->getComponent($this->questionTypeId);
    }


    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $questionTypes = QuestionType::all();
        return view('livewire.factory.render', compact("questionTypes"));
    }
}
