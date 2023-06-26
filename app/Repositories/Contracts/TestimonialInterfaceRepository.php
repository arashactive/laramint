<?php
namespace App\Repositories\Contracts;

interface TestimonialInterfaceRepository
{
    /**
     * Begin querying a model with eager loading.
     *
     * @param  array|string  $relations
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getAll();

    /**
     * fetch data from course table for one course
     *
     * @param  mixed $testimonial_id
     * @return Course
     */
    public function getTestimonialInfo($testimonial_id);

    
}
