<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

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
            'participant', 'myCourse', 'plan', 'user'
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
        Permission::create(['name' => 'mentor.list']);
        


        $role1 = Role::create(['name' => 'Super-Admin']);

        // create role and assign permission to super visor
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
        $role2->givePermissionTo('mentor.list');

        // create roles and assign existing permissions to mentos
        $role3 = Role::create(['name' => 'mentor']);
        foreach ($models as $model) {
            $role3->givePermissionTo($model . '.index');
            $role3->givePermissionTo($model . '.show');
        }
        $role3->givePermissionTo('menu.education');
        $role3->givePermissionTo('mentor.list');
        

        // create roles and assign existing permissions
        $role4 = Role::create(['name' => 'student']);
        $role4->givePermissionTo('myCourse.index');




        // create users
        // participants
        // create demo users


        // Super Admin
        $admin = \App\Models\User::factory()->create([
            'name' => 'Arvind Sutail',
            'email' => 'arvindsutail@gmail.com',
            'password' => Hash::make('!ceT$tr0ngP@ssword'),
        ]);
        $admin->assignRole($role1);
        
        $admin = \App\Models\User::factory()->create([
            'name' => 'Monica Mam',
            'email' => 'icetagr@gmail.com',
        ]);
        $admin->assignRole($role1);

        /*
        * SuperVisor Users
        */

        // SuperVisors Adults
        $supervisor = \App\Models\User::factory()->create([
            'name' => 'SuperVisor',
            'email' => 'supervisor@icetagra.com',
        ]);
        $supervisor->assignRole($role2);

        // SuperVisors Two
        $supervisorKids = \App\Models\User::factory()->create([
            'name' => 'SuperVisor Two',
            'email' => 'supervisor2@icetagra.com',
        ]);
        $supervisorKids->assignRole($role2);

        // SuperVisors Three
        $supervisorTeenage = \App\Models\User::factory()->create([
            'name' => 'SuperVisor Three',
            'email' => 'supervisor3@icetagra.com',
        ]);
        $supervisorTeenage->assignRole($role2);


        /*
        * Mentors Users
        */

        // mentor adults
        $mentor = \App\Models\User::factory()->create([
            'name' => 'mentor one',
            'email' => 'mentor1@icetagra.com',
        ]);
        $mentor->assignRole($role3);

        // mentor kids
        $mentorKids = \App\Models\User::factory()->create([
            'name' => 'mentor two',
            'email' => 'mentor2@icetagra.com',
        ]);
        $mentorKids->assignRole($role3);

        // mentor teenage
        $mentorTeenage = \App\Models\User::factory()->create([
            'name' => 'mentor three',
            'email' => 'mentor3@icetagra.com',
        ]);
        $mentorTeenage->assignRole($role3);




        /*
        * students Users
        */

        // student one
        $student = \App\Models\User::factory()->create([
            'name' => 'student One',
            'email' => 'student1@icetagra.com',
        ]);
        $student->assignRole($role4);


         // student two
         $studentTeenage = \App\Models\User::factory()->create([
            'name' => 'Student Two',
            'email' => 'student2@icetagra.com',
        ]);
        $studentTeenage->assignRole($role4);

        
         // student Three
         $studentKids = \App\Models\User::factory()->create([
            'name' => 'Student Three',
            'email' => 'student3@icetagra.com',
        ]);
        $studentKids->assignRole($role4);
    }
}
