<?php

namespace App\Services\Front;

use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\Contracts\PlanInterfaceRepository;

class CourseServices
{
    private $courseRepository;
    private $planRepository;

    public function __construct(
        CourseInterfaceRepository $courseRepository,
        PlanInterfaceRepository $planRepository
    ) {
        $this->planRepository = $planRepository;
        $this->courseRepository = $courseRepository;
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
