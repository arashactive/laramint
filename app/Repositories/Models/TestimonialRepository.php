<?php

namespace App\Repositories\Models;

use App\Models\Testimonial;
use App\Repositories\Contracts\TestimonialInterfaceRepository;
use App\Repositories\BaseRepository;

class TestimonialRepository extends BaseRepository implements TestimonialInterfaceRepository
{

    protected $model;

    public function __construct(Testimonial $testimonial)
    {
        $this->model = $testimonial;
    }

    /**
     * Begin querying a model with eager loading.
     *
     * @param  array|string  $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getAll()
    {
        return Testimonial::get();
    }


    /**
     * fetch data from course table for one course
     *
     * @param  mixed $testimonial_id
     * @return Course
     */
    public function getTestimonialInfo($testimonial_id)
    {
        return Testimonial::findorfail($testimonial_id);
    }

    
}
