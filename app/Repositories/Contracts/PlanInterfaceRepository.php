<?php
namespace App\Repositories\Contracts;

interface PlanInterfaceRepository
{
    /**
     * get All plans
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getAll();
}
