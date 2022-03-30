<?php

namespace Tests\Traits;

use App\Models\User;

/**
 * 
 */
trait FeatureTestAuth
{

    protected $userHasPermission = 1; # user arash.aspx@gmail.com is super admin

    protected $withOutPermission = 8; # user student@laramint.com is a student

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
