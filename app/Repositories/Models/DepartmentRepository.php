<?php

namespace App\Repositories\Models;

use App\Models\Department;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\DepartmentInterfaceRepository;

class DepartmentRepository extends BaseRepository implements DepartmentInterfaceRepository
{

    protected $model;

    public function __construct(Department $department)
    {
        $this->model = $department;
    }

    /**
     * getAllByTitleAndId
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllByTitleAndId()
    {
        return $this->model::pluck('title', 'id');
    }
}
