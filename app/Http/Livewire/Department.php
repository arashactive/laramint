<?php

namespace App\Http\Livewire;

use App\Traits\CrudTrait;
use Livewire\Component;

class Department extends Component
{
    use CrudTrait;

    
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.department');
    }
}
