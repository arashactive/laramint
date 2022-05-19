<?php

namespace App\Http\Livewire\Factory\Question\VoiceRecordQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;

class Create extends QuestionComponents
{

    public function mount(): void
    {
        $this->answers = [
            'min_second' => 120,
            'max_second' => 1200,
        ];
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
        return view('livewire.factory.question.voice-record-question.create');
    }
}
