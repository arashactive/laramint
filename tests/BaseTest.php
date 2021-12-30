<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\FeatureTestAuth;
use Tests\Traits\FeatureTestCrud;
use Tests\Traits\FeatureTestValidation;

abstract class BaseTest extends TestCase
{

    use RefreshDatabase, FeatureTestAuth , FeatureTestValidation , FeatureTestCrud;
    
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
     * validation_rules
     *
     * @var undefined
     */
    protected $validation_rules = null;
        
       
    /**
     * hasPermissionUser
     *
     * @var int
     */
    protected $hasPermissionUser = 1;
    
    /**
     * field
     *
     * @var string
     */
    protected $field = 'title';

    
    /**
     * setBaseRoute
     *
     * @param  mixed $base_route
     * @return void
     */
    protected function setBaseRoute($base_route)
    {
        $this->base_route = $base_route;
    }
    
    /**
     * setBaseModel
     *
     * @param  mixed $base_model
     * @return void
     */
    protected function setBaseModel($base_model)
    {
        $this->base_model = $base_model;
    }

       
    /**
     * setValidationRules
     *
     * @param  mixed $validation_rules
     * @return void
     */
    protected function setValidationRules($validation_rules)
    {
        $this->validation_rules = $validation_rules;
    }
    
    /**
     * setAccessUser
     *
     * @param  mixed $hasPermissionUser
     * @return void
     */
    protected function setAccessUser($hasPermissionUser)
    {
        $this->hasPermissionUser = $hasPermissionUser;
    }
    
    /**
     * setField
     *
     * @param  mixed $field
     * @return void
     */
    protected function setField($field){
        $this->field = $field;
    }
    
    


    


    
}
