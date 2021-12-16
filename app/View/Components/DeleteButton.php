<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteButton extends Component
{

    public $itemId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.delete');
    }
}
