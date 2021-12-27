<?php

namespace App\Http\Livewire\Box;

use Livewire\Component;

class QuizActivity extends Component
{
    public $box;

    public function show($box)
    {
        $this->box = "Salam";
    }
    
    public function render()
    {
        return view('livewire.box.quiz-activity');
    }
}
