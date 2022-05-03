<?php

namespace App\View\Components\box\mentor\comments;

use Illuminate\View\Component;

class item extends Component
{

    public $comment;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.mentor.comments.item');
    }
}
