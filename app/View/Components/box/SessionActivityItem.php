<?php

namespace App\View\Components\Box;

use App\Models\Sessionable;
use Illuminate\View\Component;

class SessionActivityItem extends Component
{
    public Sessionable $activity;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Sessionable $activity)
    {
        $this->activity = $activity;
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
