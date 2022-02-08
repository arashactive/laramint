<?php

namespace App\View\Components\front;

use Illuminate\View\Component;

class term extends Component
{
    public $term;
    public $iteration;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($term, $iteration = '')
    {
        $this->term = $term;
        $this->iteration = $iteration;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.term');
    }
}
