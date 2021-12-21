<?php

namespace App\View\Components\buttons;

use Illuminate\View\Component;

class Show extends Component
{
    public $itemId;
    public $path;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemId , $path)
    {
        $this->itemId = $itemId;
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.show');
    }
}
