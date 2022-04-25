<?php

namespace App\utility\modules\terms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TermModule
{

    public $is_mentor = false;
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function All()
    {
        return $this->user->Terms;
    }

    public function User(User $user){
        $this->user = $user;
    }

}
