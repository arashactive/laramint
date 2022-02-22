<?php

namespace App\View\Components\content;

use Illuminate\View\Component;

class rubric extends Component
{
    public $rubric;
    public $bodies;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rubric)
    {
        $this->rubric = $rubric;
        $this->bodies = json_decode($rubric->body, false);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content.rubric');
    }
}
