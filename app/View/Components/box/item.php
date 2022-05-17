<?php

namespace App\View\Components\Box;

use Illuminate\View\Component;

class Item extends Component
{

    public string $title;
    public string $color = 'primary';


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $color = 'primary')
    {
        $this->color = $color;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.item');
    }
}
