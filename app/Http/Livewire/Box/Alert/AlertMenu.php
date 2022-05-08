<?php

namespace App\Http\Livewire\Box\Alert;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AlertMenu extends Component
{

    public $notifications;

    public function markNotification($id){
        
        Auth::user()->unreadNotifications
        ->when($id, function ($query) use ($id){
            return $query->where('id', $id);
        })->markAsRead();

        $this->notifications = Auth::user()->notifications;
    }

    public function mount(){
        $this->notifications = Auth::user()->notifications;
    }
    

    public function render()
    {
        return view('livewire.box.alert.alert-menu');
    }
}
