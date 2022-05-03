<?php

namespace App\View\Components\Box;

use Illuminate\View\Component;
use Ramsey\Uuid\Type\Integer;

class ProfileTopHeader extends Component
{

    public $user;

    public $activable_id;
    public $activable_type;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $activable_id = null, $activable_type = null )
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
