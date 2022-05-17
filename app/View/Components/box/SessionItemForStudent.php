<?php

namespace App\View\Components\Box;

use App\Models\Session;
use Illuminate\View\Component;

class SessionItemForStudent extends Component
{
    public Session $session;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Session $session)
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
