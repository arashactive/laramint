<?php

namespace App\Services\Front;

use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\Models\PlanRepository;

class CourseServices
{
    protected $courseRepository;
    protected $planRepository;

    public function __construct(
        CourseInterfaceRepository $courseRepository,
        PlanRepository $planRepository
    ) {
        
        $this->courseRepository = $courseRepository;
        $this->planRepository = $planRepository;
    }


    /**
     * make data for course page info
     *
     * @param  int $course
     * @return array
     */
    public function getCourseInfo($course_id)
    {
        $course = $this->courseRepository->getCourseInfo($course_id);
        return compact("course");
    }

    /**
     * make data for plan page info
     *
     * @return array
     */
    public function getPlanPageInfo()
    {
        $plans = $this->planRepository->getAll();
        return compact("plans");
    }
}
