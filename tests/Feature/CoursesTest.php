<?php

namespace Tests\Feature;

use App\Http\Livewire\Course;
use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic feature test for course page is exist
     *
     * @return void
     */
    public function test_page_is_valid()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());
        $this->withoutExceptionHandling();
        $response = $this->get('/courses');
        $response->assertSeeText("Courses");
        $response->assertStatus(200);
    }


    /**
     * a feature test for create a new course
     *
     * @return void
     */
    public function test_course_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $this->createARecord();

        $this->get('/courses')->assertSeeText('test course');

        $this->assertDatabaseCount('courses', 1);
        $this->assertDatabaseHas('courses', [
            'name' => 'test course',
            'description' => 'test description course'
        ]);
    }



    /**
     * A feature test for course can be updated.
     *
     * @return void
     */
    public function test_course_can_be_update()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $this->createARecord();

        Livewire::test(Course::class)
            ->set("modelId", 1)
            ->set('name', 'test course updated')
            ->set('department_id', Department::factory()->create()->id)
            ->set('description', 'test description course updated')
            ->call('update')
            ->assertStatus(200);

        $this->assertDatabaseCount('courses', 1);
        $this->assertDatabaseHas('courses', [
            'name' => 'test course updated',
            'description' => 'test description course updated'
        ]);
    }



    /**
     * A feature test for course can be deleted.
     *
     * @return void
     */
    public function test_course_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $this->createARecord();

        Livewire::test(Course::class)
            ->set("modelId", 1)
            ->call('delete')
            ->assertStatus(200);

        $this->assertDatabaseCount('courses', 0);
    }


    
    /**
     * create a simple record for test
     *
     * @return void
     */
    private function createARecord()
    {
        return Livewire::test(Course::class)
            ->set('name', 'test course')
            ->set('department_id', Department::factory()->create()->id)
            ->set('description', 'test description course')
            ->call('create')
            ->assertStatus(200);
    }
}
