<?php

namespace App\Http\Livewire\Factory\Question\MatchingCaseQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;

class Create extends QuestionComponents
{

    public function mount(): void
    {
        $this->answers = [
            ['left' => '', 'right' => '']
        ];
        if (!empty($this->question)) {
            $this->setValueWithQuestion();
        }
    }

    public function addNewAnswer()
    {
        $this->answers[] = ['left' => '', 'right' => ''];
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.factory.question.matching-case-question.create');
    }
}
