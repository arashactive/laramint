<?php

namespace App\Http\Livewire\Container;

use Livewire\Component;

class ActivitiesPanel extends Component
{

     /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.container.activities-panel');
    }
}
