<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\FeatureTestAuth;
use Tests\Traits\FeatureTestCrud;
use Tests\Traits\FeatureTestValidation;

abstract class BaseTest extends TestCase
{

    use RefreshDatabase, FeatureTestAuth, FeatureTestValidation, FeatureTestCrud;

    /**
     * base_route
     *
     * @var string
     */
    protected $base_route = null;

    /**
     * base_model
     *
     * @var string
     */
    protected $base_model = null;


    /**
     * setBaseRoute
     *
     * @param  mixed $base_route
     * @return string
     */
    protected function setBaseRoute($base_route)
    {
        $this->base_route = $base_route;
    }

    /**
     * setBaseModel
     *
     * @param  mixed $base_model
     * @return string
     */
    protected function setBaseModel($base_model)
    {
        $this->base_model = $base_model;
    }
}
