<?php

namespace App\View\Components\Box\Coins;

use App\Models\Badge;
use App\Models\User;
use Illuminate\View\Component;

class UserCoins extends Component
{
    public User $user;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.coins.user-coins');
    }
}
