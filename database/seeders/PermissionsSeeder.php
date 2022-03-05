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
            'department', 'course', 'session', 'term', 'file',
            'document', 'quiz', 'question', 'rubric', 'feedback',
            'participant', 'myCourse', 'plan'
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
        Permission::create(['name' => 'menu.education']);
        Permission::create(['name' => 'menu.toolbox']);


        $role1 = Role::create(['name' => 'Super-Admin']);

        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'supervisor']);
        foreach ($models as $model) {
            $role2->givePermissionTo($model . '.index');
            $role2->givePermissionTo($model . '.create');
            $role2->givePermissionTo($model . '.edit');
            $role2->givePermissionTo($model . '.show');
        }
        $role2->givePermissionTo('document.order');
        $role2->givePermissionTo('menu.education');
        $role2->givePermissionTo('menu.toolbox');

        // create roles and assign existing permissions
        $role3 = Role::create(['name' => 'mentor']);
        foreach ($models as $model) {
            $role3->givePermissionTo($model . '.index');
            $role3->givePermissionTo($model . '.show');
        }

        // create roles and assign existing permissions
        $role4 = Role::create(['name' => 'student']);
        $role4->givePermissionTo('myCourse.index');


        // create demo users
        $admin = \App\Models\User::factory()->create([
            'name' => 'Arash Dehghani',
            'email' => 'arash.aspx@gmail.com',
        ]);
        $admin->assignRole($role1);

        $supervisor = \App\Models\User::factory()->create([
            'name' => 'SuperVisor',
            'email' => 'supervisor@laramint.com',
        ]);
        $supervisor->assignRole($role2);
        

        $mentor = \App\Models\User::factory()->create([
            'name' => 'mentor',
            'email' => 'mentor@laramint.com',
        ]);
        $mentor->assignRole($role3);

        
        $student = \App\Models\User::factory()->create([
            'name' => 'student',
            'email' => 'student@laramint.com',
        ]);
        $student->assignRole($role4);
    }
}
