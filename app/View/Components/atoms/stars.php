<?php

namespace App\View\Components\Atoms;

use Illuminate\View\Component;

class Stars extends Component
{

    public int $score;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $score)
    {
        $this->score = $score;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.atoms.stars');
    }
}
