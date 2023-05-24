<?php

namespace App\Services\Front;

use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\Contracts\DepartmentInterfaceRepository;

class HomeServices
{

    private $departmentRepository;
    private $courseRepository;

    public function __construct(
        DepartmentInterfaceRepository $departmentRepository,
        CourseInterfaceRepository $courseRepository
    ) {
        $this->departmentRepository = $departmentRepository;
        $this->courseRepository = $courseRepository;
    }

    public function homeIndex(): array
    {
        $departments = $this->departmentRepository->limit(3);
        $courses = $this->courseRepository->getAllWith('Department', 'Terms');
        return compact('departments', 'courses');
    }
}
