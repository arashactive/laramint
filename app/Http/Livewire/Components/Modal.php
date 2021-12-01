<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{

    public $listeners = ['showModal' => 'showModal'];

    public $show = false;

    public function showModal()
    {
        $this->show = !$this->show;
    }

    public function render()
    {
        return view('livewire.components.modal');
    }
}
