<?php

namespace Tests\Traits;

/**
 * 
 */
trait FeatureTestCrud
{

    
    /**
     * field
     *
     * @var string
     */
    protected $field = 'title';   
    
    /**
     * setField is default field of database to check it is true return or not
     *
     * @param  string $field = default 'title'
     * @return string
     */
    protected function setField($field){
        $this->field = $field;
    }

    /**
     * create method.
     * 
     * @return void
     */
    protected function create($attributes = [], $model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.store" : $route;
        $model = $this->base_model ?? $model;

        $attributes = !empty($attributes) ? $attributes : $model::factory()->make();
        
        if (!auth()->user()) {
            $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        }

        $this->post(route($route), $attributes->toArray())->assertRedirect();

        $this->assertDatabaseHas($model, [$this->field => $attributes->{$this->field}]);
        return $this;
    }



    /**
     * delete method.
     * 
     * @return void
     */
    protected function destroy($attributes = [], $model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.destroy" : $route;
        $model = $this->base_model ?? $model;

        $created = $model::factory()->create();
        $attributes = !empty($attributes) ? $attributes : $model::factory()->make();

        if (!auth()->user()) {
            $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        }

        $this->delete(route($route, $created->id))->assertRedirect();
        $this->assertDatabaseMissing($model, [$this->field => $attributes->{$this->field}]);
    }



    /**
     * update method.
     * 
     * @return void
     */
    protected function update($attributes = [], $model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.update" : $route;
        $model = $this->base_model ?? $model;

        $created = $model::factory()->create();
        $attributes = !empty($attributes) ? $attributes : $model::factory()->make();

        if (!auth()->user()) {
            $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        }

        $this->put(route($route, $created->id), $attributes->toArray())->assertRedirect();
        $this->assertDatabaseHas($model, [$this->field => $attributes->{$this->field}]);
    }
}
