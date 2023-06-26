<?php

namespace App\Services\Front;

use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\Contracts\DepartmentInterfaceRepository;
use App\Repositories\Contracts\TestimonialInterfaceRepository;

class HomeServices
{

    private $departmentRepository;
    private $courseRepository;
    private $testimonialRepository;

    public function __construct(
        DepartmentInterfaceRepository $departmentRepository,
        CourseInterfaceRepository $courseRepository,
        TestimonialInterfaceRepository $testimonialRepository
    ) {
        $this->departmentRepository = $departmentRepository;
        $this->courseRepository = $courseRepository;
        $this->testimonialRepository = $testimonialRepository;
    }

    public function homeIndex(): array
    {
        $departments = $this->departmentRepository->limit(3);
        $courses = $this->courseRepository->getAllWith('Department', 'Terms');
        $testimonials = $this->testimonialRepository->getAll();
        return compact('departments', 'courses','testimonials');
    }
}
