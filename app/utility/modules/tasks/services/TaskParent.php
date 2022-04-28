<?php

namespace App\utility\modules\tasks\services;

use App\Models\User;

abstract class TaskParent
{
    protected $user;


    public function set_user($user)
    {
        $this->user = $user;
    }
}
