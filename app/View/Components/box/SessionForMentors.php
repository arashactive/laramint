<?php

namespace App\View\Components\Box;

use App\Models\Session;
use App\Models\Term;
use Illuminate\View\Component;

class SessionForMentors extends Component
{
    public Session $session;
    public Term $term;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Term $term, Session $session)
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
        return view('components.box.session-for-mentors');
    }
}
