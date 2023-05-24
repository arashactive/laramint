<?php

namespace App\Repositories\Models;

use App\Models\Course;
use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\BaseRepository;

class CourseRepository extends BaseRepository implements CourseInterfaceRepository
{

    protected $model;

    public function __construct(Course $course)
    {
        $this->model = $course;
    }

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


    /**
     * getAllByTitleAndId
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllByTitleAndId()
    {
        return $this->model::pluck('title', 'id');
    }
}
