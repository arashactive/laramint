<?php

namespace App\Services\Back\Educations;

use App\Repositories\DepartmentRepository;
use App\Services\Back\Services;

class DepartmentAdminService extends Services
{

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->repository = $departmentRepository;
    }


}
