<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;


    public function setUp() :void
    {
        
        parent::setUp();

        $this->seed();
        
      
    }

    /**
     * A basic test to response 200 status for department route.
     *
     * @return void
     */
    public function test_index_show()
    {
        
        $this->withoutExceptionHandling();
        $user = User::find(1); // user with admin permission

        $response = $this->actingAs($user)
        ->get('/department');

        $response->assertStatus(200);
        $response->assertSee("Department");
    }


    /**
     * A basic test to response 403 for forbidden access level.
     *
     * @return void
     */
    public function test_index_show_only_to_admin()
    {
        $user = User::find(2); // user with teacher permission

        $response = $this->actingAs($user)
        ->get('/department');   
        $response->assertForbidden();   
    }

    /**
     * A basic test to response 403 for forbidden access level.
     *
     * @return void
     */
    public function test_create_show_only_admin()
    {
        $user = User::find(1); // user with teacher permission

        $response = $this->actingAs($user)
        ->get('/department/create');   
        $response->assertStatus(200);
        $response->assertSee("Department");
    }


    /**
     * A basic test to response 403 for forbidden access level.
     *
     * @return void
     */
    public function test_create_done_only_admin()
    {
        $department = Department::factory()->create();

        $this->assertDatabaseHas('departments',['id'=> $department->id , 'title' => $department->title]);
    }

    /**
     * A basic test to response 403 for forbidden access level.
     *
     * @return void
     */
    public function test_create_forbidden_for_unauthenticated()
    {
        $department = Department::factory()->create();

        $this->post('/department/create',$department->toArray())
        ->assertStatus(405);   
    }


}
