<?php


namespace App\Traits;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;

trait SyncPermissions
{

    /**
     * syncPermissions for each user created or updated
     *
     * @param  UserRequest  $request
     * @param  User  $user
     * @return User
     */
    public function syncPermissions(UserRequest $request, User $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        /** @phpstan-ignore-next-line */
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            /** @phpstan-ignore-next-line */
            $user->syncPermissions($permissions);
        }

         /** @phpstan-ignore-next-line */
        $user->syncRoles($roles);
        return $user;
    }
}
