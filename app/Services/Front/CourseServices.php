<?php

namespace App\Services\Front;

use App\Repositories\CourseRepository;
use App\Repositories\DepartmentRepository;

class CourseServices
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
}
