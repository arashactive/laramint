<?php

namespace App\View\Components\Box;

use App\Models\Workout;
use Illuminate\View\Component;

class workoutItem extends Component
{

    public Workout $workout;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Workout $workout)
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
