<?php

namespace App\View\Components\Box;

use Illuminate\View\Component;

class SessionItemForStudent extends Component
{
    public $session;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($session)
    {
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
