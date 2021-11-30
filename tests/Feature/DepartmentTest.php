<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use App\Http\Livewire\Department;


class DepartmentTest extends TestCase
{
    use RefreshDatabase;
     
    public function test_department_can_be_created(){
        
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        Livewire::test(Department::class)
                    ->set('name' , 'test department')
                    ->set('description' , 'test description department')
                    ->call('create')
                    ->assertStatus(200);
        
        $this->get('/department')->assertSeeText('test department');      

        $this->assertDatabaseCount('departments' , 1);
        $this->assertDatabaseHas('departments' , [
            'name' => 'test department',
            'description' => 'test description department'
        ]);

    }
}
