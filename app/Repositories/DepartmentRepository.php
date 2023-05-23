<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Repository;

class DepartmentRepository extends Repository
{

    protected $model;

    public function __construct()
    {
        $this->model = Department::class;
    }
}
