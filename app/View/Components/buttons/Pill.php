<?php

namespace App\View\Components\buttons;

use Illuminate\View\Component;

class Pill extends Component
{

    public $name = null;
    public $theme = null;
    public $count = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name , $theme , $count)
    {
        $this->name = $name;
        $this->theme = $theme;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.pill');
    }
}
