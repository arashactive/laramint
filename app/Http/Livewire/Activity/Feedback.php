<?php

namespace App\Http\Livewire\Activity;

use App\Models\Question;
use App\Models\Term;
use App\Utility\Question\QuestionFactory;
use Livewire\Component;

class Feedback extends Component
{

    public $activity;
    public Term $term;

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
        foreach ($this->activity->Questions as $question) {
            $this->questionsRender .= $this->getQuestion($question);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function showQuestion(Question $question)
    {
        return redirect()->to(url()->previous() . '#question-' . $question->id);
    }

 

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.activity.feedback');
    }
}
