<?php

namespace App\View\Components\Content;

use Illuminate\View\Component;

class Rubric extends Component
{
    public $rubric;
    public $bodies = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rubric, $bodies = null)
    {
        $this->bodies = $bodies;
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
