<?php

namespace Tests\Traits;

/**
 * 
 */
trait FeatureTestValidation
{


    /**
     * validation_rules
     *
     * @var undefined
     */
    protected $validation_rules = null;

    /**
     * setValidationRules
     *
     * @param  mixed $validation_rules
     * @return Rule
     */
    protected function setValidationRules($validation_rules)
    {
        $this->validation_rules = $validation_rules;
    }


    /**
     * validation method.
     * 
     * @return void
     */
    public function validation($attributes = [])
    {

        foreach ($this->validation_rules as $key => $rule) {

            if (
                !is_array($rule) && strpos($rule, 'required') !== false ||
                (is_array($rule) && in_array('required', $rule))
            ) {

                $route = "{$this->base_route}.store";
                $model = $this->base_model;

                if (empty($attributes))
                    $attributes = $model::factory()->make()->toArray();
                $attributes[$key] = '';

                $this->post(route($route), $attributes)->assertSessionHasErrors($key);
            }
        }
    }



    /**
     * withOutAccessLevel method.
     * 
     * @return void
     */
    public function withOutAccessLevel($route = '')
    {
        $route = $this->base_route ? "{$this->base_route}.index" : $route;
        
        $this->get(route($route))
            ->assertStatus(403);
    }
}
