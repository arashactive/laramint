<?php

namespace App\View\Components\Box;

use Illuminate\View\Component;

class workoutItem extends Component
{

    public $workout;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($workout)
    {
        $this->workout = $workout;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.workout-item');
    }
}
