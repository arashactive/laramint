<?php

namespace App\View\Components\front;

use Illuminate\View\Component;

class term extends Component
{
    public $term;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($term)
    {
        $this->term = $term;
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
