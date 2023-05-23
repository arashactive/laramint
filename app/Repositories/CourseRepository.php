<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Repository;

class CourseRepository extends Repository
{

    /**
     * Begin querying a model with eager loading.
     *
     * @param  array|string  $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getAllWith($relations)
    {
        return Course::with($relations)->get();
    }


    /**
     * fetch data from course table for one course
     *
     * @param  mixed $course_id
     * @return Course
     */
    public function getCourseInfo($course_id)
    {
        return Course::with("Terms")->findorfail($course_id);
    }
}
