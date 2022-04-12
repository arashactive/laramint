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
            'name' => 'Arash Dehghani',
            'email' => 'arash.aspx@gmail.com',
        ]);
        $admin->assignRole($role1);

        /*
        * SuperVisor Users
        */

        // SuperVisors Adults
        $supervisor = \App\Models\User::factory()->create([
            'name' => 'SuperVisor',
            'email' => 'supervisor@laramint.com',
        ]);
        $supervisor->assignRole($role2);

        // SuperVisors Kids
        $supervisorKids = \App\Models\User::factory()->create([
            'name' => 'SuperVisor Kids',
            'email' => 'kids_supervisor@laramint.com',
        ]);
        $supervisorKids->assignRole($role2);

        // SuperVisors Teenage
        $supervisorTeenage = \App\Models\User::factory()->create([
            'name' => 'SuperVisor Teenage',
            'email' => 'teenage_supervisor@laramint.com',
        ]);
        $supervisorTeenage->assignRole($role2);


        /*
        * Mentors Users
        */

        // mentor adults
        $mentor = \App\Models\User::factory()->create([
            'name' => 'mentor',
            'email' => 'mentor@laramint.com',
        ]);
        $mentor->assignRole($role3);

        // mentor kids
        $mentorKids = \App\Models\User::factory()->create([
            'name' => 'mentor kids',
            'email' => 'kids_mentor@laramint.com',
        ]);
        $mentorKids->assignRole($role3);

        // mentor teenage
        $mentorTeenage = \App\Models\User::factory()->create([
            'name' => 'mentor teenage',
            'email' => 'teenage_mentor@laramint.com',
        ]);
        $mentorTeenage->assignRole($role3);




        /*
        * students Users
        */

        // adult student
        $student = \App\Models\User::factory()->create([
            'name' => 'student',
            'email' => 'student@laramint.com',
        ]);
        $student->assignRole($role4);


         // teenage student
         $studentTeenage = \App\Models\User::factory()->create([
            'name' => 'teenage',
            'email' => 'teenage@laramint.com',
        ]);
        $studentTeenage->assignRole($role4);

        
         // kids student
         $studentKids = \App\Models\User::factory()->create([
            'name' => 'kids',
            'email' => 'kids@laramint.com',
        ]);
        $studentKids->assignRole($role4);
    }
}
