<?php

namespace App\Http\Livewire\Activity;

use App\Models\Question;
use App\utility\question\QuestionFactory;
use Livewire\Component;

class Quiz extends Component
{
    public $activity;
    public $term;

    public $workout;

    public $style;

    /*
    * $fileRender is an html code to show students.
    */
    public $questionsRender = '';

    public function mount()
    {

        if (empty($this->activity->Questions()))
            return null;

        #
        # $this->activity->show_question == 'StepByStep'
        #
        foreach ($this->activity->Questions as $question) {
            $this->questionsRender .= $this->getQuestion($question);
        }

        #
        # onePage or questions
        #
        $this->style = $this->activity->show_question;
    }

    private function getQuestion(Question $question)
    {
        return (string)QuestionFactory::Build($question->QuestionType)->createViewAsLearner($question, $this->workout);
        
    }

    public function render()
    {
        return view('livewire.activity.quiz');
    }
}
