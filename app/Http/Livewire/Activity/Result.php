<?php

namespace App\Http\Livewire\Activity;

use Livewire\Component;

class Result extends Component
{

    public $activity;
    public $term;

    public $workout;


    public function render()
    {
        return view('livewire.activity.result');
    }
}
