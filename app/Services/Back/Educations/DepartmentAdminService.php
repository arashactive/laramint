<?php

namespace App\Services\Back\Educations;

use App\Repositories\Contracts\DepartmentInterfaceRepository;
use App\Services\Back\Services;
use App\Services\Traits\CrudableService;

class DepartmentAdminService extends Services
{
    use CrudableService;

    protected $path = 'contents.admin.department';
    protected $route = 'department';

    public function __construct(DepartmentInterfaceRepository $departmentRepository)
    {
        $this->repository = $departmentRepository;
    }

    
}
