<?php

namespace App\Http\Livewire\Activity;

use App\Utility\Question\QuestionFactory;
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
            $this->questionsRender .= (string)QuestionFactory::Build($question->QuestionType)->createViewAsLearner($question, $this->workout);
        }

        #
        # onePage or questions
        #
        $this->style = $this->activity->show_question;
    }


    public function render()
    {
        return view('livewire.activity.quiz');
    }
}
