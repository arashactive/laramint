<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #1
        \App\Models\Department::factory()->create([
            'title' => 'Web Designing',
        ]);

        #2
        \App\Models\Department::factory()->create([
            'title' => 'O Level',
        ]);

        #3
        \App\Models\Department::factory()->create([
            'title' => 'Other',
        ]);

        #4
        \App\Models\Department::factory()->create([
            'title' => 'CCC',
        ]);

        
    }
}
