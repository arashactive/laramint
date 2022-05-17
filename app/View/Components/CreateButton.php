<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateButton extends Component
{

    public string $path;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.create');
    }
}
