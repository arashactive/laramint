<?php

namespace App\Http\Livewire\Traits;

trait InteractsWithModal
{
    public function openModal()
    {  
        $this->emit('showModal');
    }


}
