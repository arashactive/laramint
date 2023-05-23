<?php

namespace App\Services\Front;

use App\Repositories\CourseRepository;
use App\Repositories\DepartmentRepository;

class HomeServices
{

    private $departmentRepository;
    private $courseRepository;

    public function __construct(
        DepartmentRepository $departmentRepository,
        CourseRepository $courseRepository
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
