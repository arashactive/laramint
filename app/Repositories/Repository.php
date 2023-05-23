<?php

namespace App\Repositories;

abstract class Repository
{


    /**
     * The number of models to return for limits.
     *
     * @var int
     */
    protected $limitNumber = 5;
}
