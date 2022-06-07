<?php

namespace App\Http\Livewire\Activity;

use App\Models\Participant;
use App\Models\Question;
use App\Models\Workout;
use App\Utility\Question\QuestionFactory;
use Livewire\Component;

class Review extends Component
{
    public $activity;
    public Participant $participant;

    public Workout $workout;
    public string $questionsRender = '';

    private function getQuestion(Question $question)
    {
        return
            (string)QuestionFactory::Build($question->QuestionType)
                ->ReviewChecker($question, $this->workout);
    }


    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {

        if (empty($this->activity->Questions()))
            return null;

        foreach ($this->activity->Questions as $question) {
            $this->questionsRender .= $this->getQuestion($question);
        }

        return view('livewire.activity.review', [
            'questionsRender' => $this->questionsRender
        ]);
    }
}
