<?php

namespace App\Http\Livewire\Activity;

use App\Models\Question;
use App\utility\question\ReviewBuilderFactory;
use Livewire\Component;

class Review extends Component
{
    public $activity;
    public $term;

    public $workout;
    public $questionsRender = '';

    private function getQuestion(Question $question)
    {   
        return (string)ReviewBuilderFactory::Builder($question, $this->workout);
    }

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
