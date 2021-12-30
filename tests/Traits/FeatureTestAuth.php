<?php

namespace Tests\Traits;

use App\Models\User;

/**
 * 
 */
trait FeatureTestAuth
{

    /**
     * signIn method.
     * 
     * @return void
     */
    public function signIn($user = null)
    {

        $user = $user ? User::find($user) : User::find($this->hasPermissionUser);
        $this->actingAs($user);
        return $this;
    }


    /**
     * withOutPermissionUser method is login with user without permission
     * 
     * @return void
     */
    public function withOutPermissionUser($user)
    {
        $this->signIn($user);
    }

    
}
