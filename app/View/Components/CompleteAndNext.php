<?php

namespace App\View\Components;

use App\Models\Workout;
use Illuminate\View\Component;

class CompleteAndNext extends Component
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
        return view('components.buttons.complete-and-next');
    }
}
