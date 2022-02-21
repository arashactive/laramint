<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Department;
use App\Models\Term;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory()->count(5)->create();
        Course::factory()->count(15)->create();
        Term::factory()->count(15)->create();
    }
}
