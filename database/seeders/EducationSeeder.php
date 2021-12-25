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
        $departments = [];
        $departments[] = Department::create([
            'title' => 'English Department',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed augue est, tincidunt et mi a, ullamcorper congue odio. Morbi id feugiat nunc. Vestibulum sed nunc enim. Donec eget ante erat. Nunc dolor tortor, laoreet luctus molestie vel, vulputate eget nunc. Ut rhoncus sodales metus id vehicula. Ut vulputate id nisl quis sollicitudin. Aenean tincidunt, nulla a porttitor fringilla, diam enim scelerisque lacus, vel vestibulum ligula felis ac ligula. Praesent dignissim euismod risus viverra scelerisque. Suspendisse ac dolor eget erat elementum efficitur. Duis bibendum augue ac magna iaculis, non euismod urna porttitor. Aenean vitae dui et urna fermentum ultrices. Phasellus consequat ante eget nisi vulputate, eu tincidunt ex blandit. Donec sodales vulputate ipsum, in bibendum ligula sollicitudin quis. Maecenas vel pellentesque leo.',
            'is_published' => 1,
            'image' => ''
        ]);

        $departments[] = Department::create([
            'title' => 'Germany Department',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed augue est, tincidunt et mi a, ullamcorper congue odio. Morbi id feugiat nunc. Vestibulum sed nunc enim. Donec eget ante erat. Nunc dolor tortor, laoreet luctus molestie vel, vulputate eget nunc. Ut rhoncus sodales metus id vehicula. Ut vulputate id nisl quis sollicitudin. Aenean tincidunt, nulla a porttitor fringilla, diam enim scelerisque lacus, vel vestibulum ligula felis ac ligula. Praesent dignissim euismod risus viverra scelerisque. Suspendisse ac dolor eget erat elementum efficitur. Duis bibendum augue ac magna iaculis, non euismod urna porttitor. Aenean vitae dui et urna fermentum ultrices. Phasellus consequat ante eget nisi vulputate, eu tincidunt ex blandit. Donec sodales vulputate ipsum, in bibendum ligula sollicitudin quis. Maecenas vel pellentesque leo.',
            'is_published' => 1,
            'image' => ''
        ]);

        $departments[] = Department::create([
            'title' => 'Persian Department',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed augue est, tincidunt et mi a, ullamcorper congue odio. Morbi id feugiat nunc. Vestibulum sed nunc enim. Donec eget ante erat. Nunc dolor tortor, laoreet luctus molestie vel, vulputate eget nunc. Ut rhoncus sodales metus id vehicula. Ut vulputate id nisl quis sollicitudin. Aenean tincidunt, nulla a porttitor fringilla, diam enim scelerisque lacus, vel vestibulum ligula felis ac ligula. Praesent dignissim euismod risus viverra scelerisque. Suspendisse ac dolor eget erat elementum efficitur. Duis bibendum augue ac magna iaculis, non euismod urna porttitor. Aenean vitae dui et urna fermentum ultrices. Phasellus consequat ante eget nisi vulputate, eu tincidunt ex blandit. Donec sodales vulputate ipsum, in bibendum ligula sollicitudin quis. Maecenas vel pellentesque leo.',
            'is_published' => 1,
            'image' => ''
        ]);
        $courses = [];
        foreach ($departments as $department) {
            $courses[] = Course::create([
                'department_id' => $department->id,
                'title' => 'adult',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed augue est, tincidunt et mi a, ullamcorper congue odio. Morbi id feugiat nunc. Vestibulum sed nunc enim. Donec eget ante erat. Nunc dolor tortor, laoreet luctus molestie vel, vulputate eget nunc. Ut rhoncus sodales metus id vehicula. Ut vulputate id nisl quis sollicitudin. Aenean tincidunt, nulla a porttitor fringilla, diam enim scelerisque lacus, vel vestibulum ligula felis ac ligula. Praesent dignissim euismod risus viverra scelerisque. Suspendisse ac dolor eget erat elementum efficitur. Duis bibendum augue ac magna iaculis, non euismod urna porttitor. Aenean vitae dui et urna fermentum ultrices. Phasellus consequat ante eget nisi vulputate, eu tincidunt ex blandit. Donec sodales vulputate ipsum, in bibendum ligula sollicitudin quis. Maecenas vel pellentesque leo.',
                'is_published' => 1,
                'image' => ''
            ]);

            $courses[] = Course::create([
                'department_id' => $department->id,
                'title' => 'teenage',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed augue est, tincidunt et mi a, ullamcorper congue odio. Morbi id feugiat nunc. Vestibulum sed nunc enim. Donec eget ante erat. Nunc dolor tortor, laoreet luctus molestie vel, vulputate eget nunc. Ut rhoncus sodales metus id vehicula. Ut vulputate id nisl quis sollicitudin. Aenean tincidunt, nulla a porttitor fringilla, diam enim scelerisque lacus, vel vestibulum ligula felis ac ligula. Praesent dignissim euismod risus viverra scelerisque. Suspendisse ac dolor eget erat elementum efficitur. Duis bibendum augue ac magna iaculis, non euismod urna porttitor. Aenean vitae dui et urna fermentum ultrices. Phasellus consequat ante eget nisi vulputate, eu tincidunt ex blandit. Donec sodales vulputate ipsum, in bibendum ligula sollicitudin quis. Maecenas vel pellentesque leo.',
                'is_published' => 1,
                'image' => ''
            ]);

            $courses[] = Course::create([
                'department_id' => $department->id,
                'title' => 'kids',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed augue est, tincidunt et mi a, ullamcorper congue odio. Morbi id feugiat nunc. Vestibulum sed nunc enim. Donec eget ante erat. Nunc dolor tortor, laoreet luctus molestie vel, vulputate eget nunc. Ut rhoncus sodales metus id vehicula. Ut vulputate id nisl quis sollicitudin. Aenean tincidunt, nulla a porttitor fringilla, diam enim scelerisque lacus, vel vestibulum ligula felis ac ligula. Praesent dignissim euismod risus viverra scelerisque. Suspendisse ac dolor eget erat elementum efficitur. Duis bibendum augue ac magna iaculis, non euismod urna porttitor. Aenean vitae dui et urna fermentum ultrices. Phasellus consequat ante eget nisi vulputate, eu tincidunt ex blandit. Donec sodales vulputate ipsum, in bibendum ligula sollicitudin quis. Maecenas vel pellentesque leo.',
                'is_published' => 1,
                'image' => ''
            ]);
        }
        $terms = [];
        foreach ($departments as $department) {
            foreach ($courses as $course) {
                $term[] = Term::create([
                    'department_id' => $department->id,
                    'course_id' => $course->id,
                    'title' => $department->title . ' - ' . $course->title . ': ' . Str::random(2),
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed augue est, tincidunt et mi a, ullamcorper congue odio. Morbi id feugiat nunc. Vestibulum sed nunc enim. Donec eget ante erat. Nunc dolor tortor, laoreet luctus molestie vel, vulputate eget nunc. Ut rhoncus sodales metus id vehicula. Ut vulputate id nisl quis sollicitudin. Aenean tincidunt, nulla a porttitor fringilla, diam enim scelerisque lacus, vel vestibulum ligula felis ac ligula. Praesent dignissim euismod risus viverra scelerisque. Suspendisse ac dolor eget erat elementum efficitur. Duis bibendum augue ac magna iaculis, non euismod urna porttitor. Aenean vitae dui et urna fermentum ultrices. Phasellus consequat ante eget nisi vulputate, eu tincidunt ex blandit. Donec sodales vulputate ipsum, in bibendum ligula sollicitudin quis. Maecenas vel pellentesque leo.',
                    'is_published' => 1,
                    'image' => ''
                ]);
            }
        }
    }
}
