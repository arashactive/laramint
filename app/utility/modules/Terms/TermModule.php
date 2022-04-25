<?php

namespace App\utility\modules\terms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TermModule
{

    private $is_mentor = false;
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function All()
    {
        return $this->user->Terms;
    }


    public function is_mentor($value = true){
        $this->is_mentor = $value;
    }

    public function User(User $user){
        $this->user = $user;
    }

}
