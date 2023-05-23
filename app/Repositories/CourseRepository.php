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
}
