<?php

namespace App\Repositories\Models;

use App\Models\Course;
use App\Models\Term;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\TermInterfaceRepository;

class TermRepository extends BaseRepository implements TermInterfaceRepository
{

    protected $model;

    public function __construct(Term $term)
    {
        $this->model = $term;
    }

    public function getTermWithParticipants()
    {
        return Term::with('Participants')
            ->getParticipants()
            ->paginate();
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
}
