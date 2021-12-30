<?php

namespace Tests\Traits;

use App\Models\User;

/**
 * 
 */
trait FeatureTestAuth
{

    protected $userHasPermission = 1;

    protected $withOutPermission = 4;

    /**
     * signIn method.
     * 
     * @return void
     */
    public function signIn($user = null)
    {

        $user = $user ? User::find($user) : User::find($this->userHasPermission);
        $this->actingAs($user);
        return $this;
    }


    /**
     * withOutPermissionUser method is login with user without permission
     * 
     * @return void
     */
    public function withOutPermissionUser()
    {
        $this->signIn($this->withOutPermission);
    }
}
