<?php

namespace App\View\Components\box;

use Illuminate\View\Component;

class SessionItemForStudent extends Component
{
    public $session;
    public $term;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($term, $session)
    {
        $this->term = $term;
        $this->session = $session;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.session-item-for-student');
    }
}
