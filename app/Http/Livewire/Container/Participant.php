<?php

namespace App\Http\Livewire\Container;

use App\Models\User;
use Livewire\Component;

class Participant extends Component
{

    public $search = '';

    public $route;
    public $parent;
    

    public function render()
    {
        $search = '%' . $this->search . '%';
        $participants = User::where('name', 'LIKE', $search)
            ->orWhere('email', 'LIKE', $search)
            ->orderby('updated_at', 'desc')
            ->paginate();

        return view('livewire.container.participant', [
            'participants' => $participants
        ]);
    }


    
}
