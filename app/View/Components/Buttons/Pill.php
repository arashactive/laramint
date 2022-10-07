<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Pill extends Component
{

    public string $name = '';
    public string $theme = '';
    public string $count = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name , string $theme ,string $count)
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
