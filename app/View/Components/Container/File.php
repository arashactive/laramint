<?php

namespace App\View\Components\Container;

use Illuminate\View\Component;

class File extends Component
{
    public $file = null;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($file )
    {
        $this->file = $file;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.container.file');
    }
}
