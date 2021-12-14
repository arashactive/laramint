<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DepartmentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test for checking index is exist.
     *
     * @return void
     */
    public function test_index_exist()
    {
        $this->withoutExceptionHandling();

        Sanctum::actingAs(User::factory()->create());

        $response = $this->get('/api/department');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test for create a new department
     *
     * @return void
     */
    public function test_create_department(){
        
        Sanctum::actingAs(User::factory()->create());
        $response = $this->post(route('department.store'), [
            'name' => 'Adult',
            'description' => 'Adult'
        ]);

        $this->assertDatabaseCount('departments', 1);
        $response->assertStatus(200);
    }



    /**
     * A basic feature test for checking return json data
     *
     * @return void
     */
    public function test_fetch_departments(){
        Sanctum::actingAs(User::factory()->create());
        $this->seed(DepartmentSeeder::class);

        $response = $this->get(route('department.index'));

        $response->assertJsonCount(3);
    }


    /**
     * A basic feature test for updating an old department
     *
     * @return void
     */
    public function test_update_departments(){
        Sanctum::actingAs(User::factory()->create());
        $this->seed(DepartmentSeeder::class);
        
        $response = $this->put(route('department.update' , 1), [
            'name' => 'Adult Department 2',
            'description' => 'Adult'
        ]);

        $this->assertDatabaseCount('departments', 3);
        $this->assertDatabaseHas('departments', [
            'name' => 'Adult Department 2',
            'description' => 'Adult'
        ]);
        $response->assertStatus(200);
    }


    
    /**
     * A basic feature test for delete an old department
     *
     * @return void
     */
    public function test_delete_departments(){
        Sanctum::actingAs(User::factory()->create());
        $this->seed(DepartmentSeeder::class);
        
        $response = $this->delete(route('department.destroy' , 2), [
            'name' => 'Adult Department 2',
            'description' => 'Adult'
        ]);

        $this->assertDatabaseCount('departments', 2);
        $response->assertStatus(301);
    }

}
