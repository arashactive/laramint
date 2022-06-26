<?php

namespace App\Http\Livewire\Box\Alert;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AlertMenu extends Component
{

    public $notifications;

    public function markNotification($id)
    {
        /** @phpstan-ignore-next-line */
        Auth::user()->unreadNotifications
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id);
            })->markAsRead();

        $this->setNotification();
    }

    public function mount(): void
    {
        $this->setNotification();
    }


    private function setNotification(): void
    {
        $this->notifications = Auth::user()->notifications;
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.box.alert.alert-menu');
    }
}
