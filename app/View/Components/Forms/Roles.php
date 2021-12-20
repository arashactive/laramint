<?php

namespace App\View\Components\Forms;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\Component;


class Roles extends Component
{
    public $roles = null;
    public $user = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user = null)
    {
        $this->user = null;
        
        if((int)$user > 0){
            $user = User::findorfail($user);
            $this->user = $user->Roles->pluck('name' , 'id')->toArray();
            
        }

        
        $this->roles = Role::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.roles');
    }
}
