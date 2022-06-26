<?php

namespace App\View\Components\Box;

use App\Models\User;
use Illuminate\View\Component;

class UserBadge extends Component
{

    public User $user;
    public int $coins = 0;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        $this->coins = $user->coins;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.user-badge');
    }
}
