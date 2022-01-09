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

        $models = [
            'department', 'course', 'session', 'term', 'file', 'document' , 'quiz'
        ];

        foreach ($models as $model) {
            // create permissions
            Permission::create(['name' => $model . '.index']);
            Permission::create(['name' => $model . '.create']);
            Permission::create(['name' => $model . '.edit']);
            Permission::create(['name' => $model . '.delete']);
            Permission::create(['name' => $model . '.show']);
        }

        Permission::create(['name' => 'document.order']);


        $role1 = Role::create(['name' => 'Super-Admin']);

        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'supervisor']);
        foreach( $models as $model){
            $role2->givePermissionTo($model . '.index');
            $role2->givePermissionTo($model . '.create');
            $role2->givePermissionTo($model . '.edit');
            $role2->givePermissionTo($model . '.show');
        }
        $role2->givePermissionTo('document.order');

        // create roles and assign existing permissions
        $role3 = Role::create(['name' => 'mentor']);
        foreach( $models as $model){
            $role3->givePermissionTo($model . '.index');
            $role3->givePermissionTo($model . '.show');
        }

        // create roles and assign existing permissions
        $role4 = Role::create(['name' => 'student']);
        $role4->givePermissionTo('document.order');
       

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Arash Dehghani',
            'email' => 'arash@mint.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'mr.Mosavi',
            'email' => 'mosavi@mint.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Ali Dehghani',
            'email' => 'ali@mint.com',
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Student A1',
            'email' => 'student_A1@mint.com',
        ]);
        $user->assignRole($role4);
    }


}
