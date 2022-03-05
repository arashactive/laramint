<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // adults department && Starter Course
        # 1
        \App\Models\Term::factory()->create([
            'title' => 'Starter Term #1',
            'department_id' => 1,
            'course_id' => 1
        ]);

        # 2
        \App\Models\Term::factory()->create([
            'title' => 'Starter Term #2',
            'department_id' => 1,
            'course_id' => 1
        ]);


        // adults department && Elementary Course
        # 3
        \App\Models\Term::factory()->create([
            'title' => 'Elementary Term #1',
            'department_id' => 1,
            'course_id' => 2
        ]);

        # 4
        \App\Models\Term::factory()->create([
            'title' => 'Elementary Term #2',
            'department_id' => 1,
            'course_id' => 2
        ]);

        # 5
        \App\Models\Term::factory()->create([
            'title' => 'Elementary Term #3',
            'department_id' => 1,
            'course_id' => 2
        ]);


        // adults department && PreIntermediate Course
        # 6
        \App\Models\Term::factory()->create([
            'title' => 'PreIntermediate Term #1',
            'department_id' => 1,
            'course_id' => 3
        ]);

        # 7
        \App\Models\Term::factory()->create([
            'title' => 'PreIntermediate Term #2',
            'department_id' => 1,
            'course_id' => 3
        ]);

        # 8
        \App\Models\Term::factory()->create([
            'title' => 'PreIntermediate Term #3',
            'department_id' => 1,
            'course_id' => 3
        ]);


        // adults department && Intermediate Course
        # 9
        \App\Models\Term::factory()->create([
            'title' => 'Intermediate Term #1',
            'department_id' => 1,
            'course_id' => 4
        ]);

        # 10
        \App\Models\Term::factory()->create([
            'title' => 'Intermediate Term #2',
            'department_id' => 1,
            'course_id' => 4
        ]);

        # 11
        \App\Models\Term::factory()->create([
            'title' => 'Intermediate Term #3',
            'department_id' => 1,
            'course_id' => 4
        ]);    


        // adults department && Advanced Course
        # 12
        \App\Models\Term::factory()->create([
            'title' => 'Advanced Term #1',
            'department_id' => 1,
            'course_id' => 5
        ]);

        # 13
        \App\Models\Term::factory()->create([
            'title' => 'Advanced Term #2',
            'department_id' => 1,
            'course_id' => 5
        ]);

        # 14
        \App\Models\Term::factory()->create([
            'title' => 'Advanced Term #3',
            'department_id' => 1,
            'course_id' => 5
        ]);





        // teenager department && Got It Starter Course
        # 15
        \App\Models\Term::factory()->create([
            'title' => 'Teen Starter Term #1',
            'department_id' => 2,
            'course_id' => 6
        ]);

        # 16
        \App\Models\Term::factory()->create([
            'title' => 'Teen Starter Term #2',
            'department_id' => 2,
            'course_id' => 6
        ]);


        // teenager department && Got It level 1
        # 17
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #1 Term #1',
            'department_id' => 2,
            'course_id' => 2
        ]);

        # 18
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #1 Term #2',
            'department_id' => 2,
            'course_id' => 7
        ]);

        # 19
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #1 Term #3',
            'department_id' => 2,
            'course_id' => 7
        ]);


        // teenager department && Got It level 2
        # 20
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #2 Term #1',
            'department_id' => 2,
            'course_id' => 8
        ]);

        # 21
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #2 Term #2',
            'department_id' => 2,
            'course_id' => 8
        ]);

        # 22
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #2 Term #3',
            'department_id' => 2,
            'course_id' => 8
        ]);


        // teenager department && Got It level 3
        # 23
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #3 Term #1',
            'department_id' => 2,
            'course_id' => 9
        ]);

        # 24
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #3 Term #2',
            'department_id' => 2,
            'course_id' => 9
        ]);

        # 25
        \App\Models\Term::factory()->create([
            'title' => 'Teen Level #3 Term #3',
            'department_id' => 2,
            'course_id' => 9
        ]);    



        // kids department && Family & Friend Starter
        # 26
        \App\Models\Term::factory()->create([
            'title' => 'Kids Starter Term #1',
            'department_id' => 3,
            'course_id' => 10
        ]);

        # 27
        \App\Models\Term::factory()->create([
            'title' => 'Kids Starter Term #2',
            'department_id' => 3,
            'course_id' => 10
        ]);


        
        
    }
}
