<?php

namespace App\Utility\Modules\Tasks\Services;

abstract class TaskParent
{
    protected $user;


    public function set_user($user)
    {
        $this->user = $user;
    }
}
