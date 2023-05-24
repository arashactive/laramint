<?php

namespace App\Repositories\Models;

use App\Models\Plan;
use App\Repositories\BaseRepository;

class PlanRepository extends BaseRepository
{

    protected $model;

    public function __construct(Plan $plan)
    {
        $this->model = $plan;
    }

    /**
     * get All plans
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getAll()
    {
        return $this->model->all();
    }
}
