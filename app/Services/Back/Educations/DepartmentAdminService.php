<?php

namespace App\Services\Back\Educations;

use App\Repositories\DepartmentRepository;
use App\Services\Back\Services;
use App\Services\Traits\CrudService;

class DepartmentAdminService extends Services
{
    use CrudService;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->repository = $departmentRepository;
        $this->path = 'contents.admin.department';
    }
}
