<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Repository;

class DepartmentRepository extends Repository
{

    /**
     *  Limit Number of department return by default 5
     *
     * @param  int  $limitNumber
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function limit($limitNumber = 0)
    {

        if ($limitNumber > 0) {
            $this->limitNumber = $limitNumber;
        }

        return Department::limit($this->limitNumber)->get();
    }
}
