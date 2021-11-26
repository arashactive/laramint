<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use DatabaseTransactions;
     
    
    /**
     * check status is 200
     *
     * @return void
     */
    public function test_index_department()
    {

        $userCreate = User::factory()->create();

        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/department');
        $response->assertStatus(200);
        
    }
}
