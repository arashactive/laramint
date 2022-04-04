<?php

namespace App\View\Components\box;

use Illuminate\View\Component;

class SessionActivityItem extends Component
{
    public $activity;
    public $term;
    public $session;
    public $sessionable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($term, $activity, $session, $sessionable)
    {
        $this->term = $term;
        $this->activity = $activity;
        $this->session = $session;
        $this->sessionable = $sessionable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.session-activity-item');
    }
}
