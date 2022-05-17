<?php

namespace App\View\Components\Box;

use App\Models\User;
use Illuminate\View\Component;
use Ramsey\Uuid\Type\Integer;

class ProfileTopHeader extends Component
{

    public User $user;

    public int $activable_id;
    public string $activable_type;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user, int $activable_id = 0, string $activable_type = '' )
    {
        $this->user = $user;
        $this->activable_id = $activable_id;
        $this->activable_type = $activable_type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.profile-top-header');
    }
}
