<?php

namespace App\Http\Livewire\Activity;

use App\Models\Term;
use App\Models\Workout;
use Livewire\Component;

class Result extends Component
{

    public $activity;
    public Term $term;

    public Workout $workout;

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.activity.result');
    }
}
