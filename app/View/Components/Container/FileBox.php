<?php

namespace App\View\Components\Container;

use Illuminate\View\Component;

class FileBox extends Component
{
    public $file = null;
    public $first = null;
    public $last = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($file , $first , $last )
    {
        $this->file = $file;
        $this->first = $first;
        $this->last = $last;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.container.file-box');
    }
}
