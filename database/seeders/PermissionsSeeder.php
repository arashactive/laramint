<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // create permissions
        Permission::create(['name' => 'edit departments']);
        Permission::create(['name' => 'delete departments']);
        Permission::create(['name' => 'publish departments']);
        Permission::create(['name' => 'unpublish departments']);


        $role1 = Role::create(['name' => 'Super-Admin']);

        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'supervisor']);
        $role2->givePermissionTo('edit departments');
        $role2->givePermissionTo('delete departments');
        $role2->givePermissionTo('publish departments');
        $role2->givePermissionTo('unpublish departments');


        // create roles and assign existing permissions
        $role3 = Role::create(['name' => 'teacher']);
        $role3->givePermissionTo('edit departments');


        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Arash Dehghani',
            'email' => 'arash@mint.org',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'mr.Mosavi',
            'email' => 'mosavi@mint.org',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Ali Dehghani',
            'email' => 'ali@mint.org',
        ]);
        $user->assignRole($role3);
    }
}
