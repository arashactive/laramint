<?php

namespace App\Http\Livewire\Container;

use App\Models\Session;
use Livewire\Component;

class SessionPanel extends Component
{

    public $search = '';

    public $route;
    public $parent;
    
    public function render()
    {
        $search = '%' . $this->search . '%';
        $sessions = Session::where('title', 'LIKE', $search)
            ->orderby('updated_at', 'desc')
            ->paginate();

        return view('livewire.container.session-panel', [
            'sessions' => $sessions
        ]);
    }
}
