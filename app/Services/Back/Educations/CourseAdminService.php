<?php

namespace App\Services\Back\Educations;

use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\Contracts\DepartmentInterfaceRepository;
use App\Services\Back\Services;
use App\Services\Traits\CrudableService;

class CourseAdminService extends Services
{
    use CrudableService;

    protected $path = 'contents.admin.courses';
    protected $route = 'course';

    protected $departmentRepository;

    public function __construct(
        CourseInterfaceRepository $courseRepository,
        DepartmentInterfaceRepository $departmentRepository
    ) {
        $this->repository = $courseRepository;
        $this->departmentRepository = $departmentRepository;
    }


    /**
     * create prepare for view
     *
     * @return array
     */
    public function create()
    {
        return ['departments' => $this->departmentRepository->getAllByTitleAndId()];
    }

    /**
     * create prepare for view
     * @param int $course_id
     * @return array
     */
    public function edit(
        $course_id
    ) {
        return [
            'course' => $this->repository->findById($course_id),
            'departments' => $this->departmentRepository->getAllByTitleAndId()
        ];
    }
}
