<?php

namespace App\Repositories;

use App\Models\Plan;

class PlanRepository extends Repository
{

     /**
     * get All plans
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getAll()
    {
        return Plan::all();
    }

}
