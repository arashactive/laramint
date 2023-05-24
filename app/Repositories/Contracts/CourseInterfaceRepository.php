<?php
namespace App\Repositories\Contracts;

interface CourseInterfaceRepository
{
    /**
     * Begin querying a model with eager loading.
     *
     * @param  array|string  $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getAllWith($relations);

    /**
     * fetch data from course table for one course
     *
     * @param  mixed $course_id
     * @return Course
     */
    public function getCourseInfo($course_id);

    /**
     * getAllByTitleAndId
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllByTitleAndId();
}
