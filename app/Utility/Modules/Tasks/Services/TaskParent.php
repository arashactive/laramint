<?php

namespace App\Utility\Modules\Tasks\Services;

use App\Models\User;

abstract class TaskParent
{
    protected User $user;

    
    /**
     * set_user
     *
     * @param  User $user
     * @return void
     */
    public function set_user($user)
    {
        $this->user = $user;
    }
}
