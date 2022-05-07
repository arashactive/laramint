<?php

namespace App\Http\Livewire\Activity;

use App\Models\Question;
use App\Utility\Question\QuestionFactory;
use Livewire\Component;

class Feedback extends Component
{

    public $activity;
    public $term;

    /*
    * $fileRender is an html code to show students.
    */
    public $questionsRender = '';

    public function mount()
    {
        if (empty($this->activity->Questions()))
            return null;
        foreach ($this->activity->Questions as $question) {
            $this->questionsRender .= $this->getQuestion($question);
        }
    }

    public function showQuestion(Question $question)
    {
        return redirect()->to(url()->previous() . '#question-' . $question->id);
    }

    private function getQuestion(Question $question)
    {
        return (string)QuestionFactory::QuestionBuidler($question);
    }


    public function render()
    {
        return view('livewire.activity.feedback');
    }
}
