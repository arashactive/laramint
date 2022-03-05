<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // adults department
        # 1
        \App\Models\Course::factory()->create([
            'title' => 'AEF Starter',
            'department_id' => 1
        ]);

        # 2
        \App\Models\Course::factory()->create([
            'title' => 'AEF Elemenatry',
            'department_id' => 1
        ]);

        # 3
        \App\Models\Course::factory()->create([
            'title' => 'AEF PreIntermediate',
            'department_id' => 1
        ]);

        # 4
        \App\Models\Course::factory()->create([
            'title' => 'AEF Intermediate',
            'department_id' => 1
        ]);

        # 5
        \App\Models\Course::factory()->create([
            'title' => 'AEF Advance',
            'department_id' => 1
        ]);


        // teenager department
        # 6
        \App\Models\Course::factory()->create([
            'title' => 'Got it Starter',
            'department_id' => 2
        ]);

        # 7
        \App\Models\Course::factory()->create([
            'title' => 'Got it Level 1',
            'department_id' => 2
        ]);

        # 8
        \App\Models\Course::factory()->create([
            'title' => 'Got it Level 2',
            'department_id' => 2
        ]);

        # 9
        \App\Models\Course::factory()->create([
            'title' => 'Got it Level 3',
            'department_id' => 2
        ]);


        // kids department
        # 10
        \App\Models\Course::factory()->create([
            'title' => 'Family And Friends Starter',
            'department_id' => 3
        ]);

        # 11
        \App\Models\Course::factory()->create([
            'title' => 'Family And Friends 1',
            'department_id' => 3
        ]);

        # 12
        \App\Models\Course::factory()->create([
            'title' => 'Family And Friends 2',
            'department_id' => 3
        ]);

        # 13
        \App\Models\Course::factory()->create([
            'title' => 'Family And Friends 3',
            'department_id' => 3
        ]);

        # 14
        \App\Models\Course::factory()->create([
            'title' => 'Family And Friends 4',
            'department_id' => 3
        ]);

        # 15
        \App\Models\Course::factory()->create([
            'title' => 'Family And Friends 5',
            'department_id' => 3
        ]);

        # 16
        \App\Models\Course::factory()->create([
            'title' => 'Family And Friends 6',
            'department_id' => 3
        ]);


        // Ielts department
        # 17
        \App\Models\Course::factory()->create([
            'title' => 'Collins get ready',
            'department_id' => 4
        ]);

        # 18
        \App\Models\Course::factory()->create([
            'title' => 'collins ielts',
            'department_id' => 4
        ]);
      
    }
}
