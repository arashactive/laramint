<?php

namespace App\Services\Back\Educations;

use App\Repositories\CourseRepository;
use App\Repositories\DepartmentRepository;
use App\Services\Back\Services;
use App\Services\Traits\CrudableService;

class CourseAdminService extends Services
{
    use CrudableService;
    protected $path = 'contents.admin.courses';
    protected $route = 'course';

    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }


    /**
     * create prepare for view
     *
     * @return array
     */
    public function create()
    {
        $departmentRepository = new DepartmentRepository();
        return ['departments' => $departmentRepository->getAllByTitleAndId()];
    }

    /**
     * create prepare for view
     * @param int $course_id
     * @return array
     */
    public function edit($course_id)
    {
        $departmentRepository = new DepartmentRepository();
        return [
            'course' => $this->repository->findById($course_id),
            'departments' => $departmentRepository->getAllByTitleAndId()
        ];
    }
}
