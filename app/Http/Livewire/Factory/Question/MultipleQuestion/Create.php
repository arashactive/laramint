<?php

namespace App\Http\Livewire\Factory\Question\MultipleQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;

class Create extends QuestionComponents
{


    public function mount(): void
    {
        $this->answers = ['', '', '', ''];
        $this->correctAnswer = ['', '', '', ''];
        if (!empty($this->question)) {
            $this->setValueWithQuestion();
        }
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.factory.question.multiple-question.create');
    }
}
