<?php

namespace App\Http\Livewire\Activity;

use App\Models\Participant;
use App\Models\Workout;
use App\Utility\Question\QuestionFactory;
use Livewire\Component;

class Quiz extends Component
{
    public $activity;
    public Participant $participant;

    public Workout $workout;

    public string $style;

    /*
    * $fileRender is an html code to show students.
    */
    public string $questionsRender = '';
    
    /**
     * mount
     *
     * @return void|null
     */
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

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.activity.quiz');
    }
}
