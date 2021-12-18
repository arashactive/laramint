<?php

namespace Tests;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class BaseTest extends TestCase
{


    use RefreshDatabase;

    protected $base_route = null;
    protected $base_model = null;
    protected $validation_rules = null;
    protected $access_user = 1;

    protected function setAccessUser($access_user)
    {
        $this->access_user = $access_user;
    }

    protected function setValidationRules($validation_rules)
    {
        $this->validation_rules = $validation_rules;
    }

    protected function setBaseModel($base_model)
    {
        $this->base_model = $base_model;
    }

    protected function setBaseRoute($base_route)
    {
        $this->base_route = $base_route;
    }

    protected function signIn($user = null)
    {
        
        $user = $user ? User::find($user) : User::find($this->access_user);
        $this->actingAs($user);
        return $this;
    }


    public function validation()
    {

        foreach ($this->validation_rules as $key => $rule) {
            if (strpos($rule, 'required') !== false) {
                $route = "{$this->base_route}.store";
                $model = $this->base_model;
                $attributes = $model::factory()->make()->toArray();
                $attributes[$key] = '';
                $this->post(route($route), $attributes)->assertSessionHasErrors($key);
            }
        }
    }

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
        
        $this->assertDatabaseHas($model, ['title' => $attributes->title]);
        
    }


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
        $this->assertDatabaseMissing($model, ['title' => $attributes->title]);
    }

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
        $this->assertDatabaseHas($model, ['title' => $attributes->title]);
    }


    public function withOutAccessLevel($route = '')
    {
        $route = $this->base_route ? "{$this->base_route}.index" : $route;

        $this->get(route($route))
            ->assertStatus(403);
    }
}
