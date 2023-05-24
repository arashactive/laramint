<?php

namespace App\Repositories\Contracts;

interface DepartmentInterfaceRepository
{
    /**
     * getAllByTitleAndId
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllByTitleAndId();
}
