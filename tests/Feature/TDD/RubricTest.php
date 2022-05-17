<?php

namespace Tests\Feature\TDD;

use App\Http\Livewire\Services\Rubric;
use App\Models\Rubric as ModelsRubric;
use Livewire\Livewire;
use Tests\BaseTest;

class RubricTest extends BaseTest
{
    private $route = 'rubric';

    private $body = [
        'item_title' => 'test',
        'cells' => [
            ['title' => 'test', 'score' => 0, 'pass_score' => false],
            ['title' => 'test', 'score' => 1, 'pass_score' => false],
            ['title' => 'test', 'score' => 2, 'pass_score' => false],
        ]
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute($this->route);
        $this->setBaseModel('App\Models\Rubric');
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_index_form()
    {
        $this->signIn();

        $response = $this->get(route($this->route . '.index'));
        $response->assertStatus(200);
    }

    


    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $response = $this->get(route($this->route . '.create'));
        $response->assertStatus(200);
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_rubric()
    {
        $this->signIn();
        $bodies[] = $this->body;
        Livewire::test(Rubric::class)
            ->set('title', 'test A1')
            ->set('description', 'test A1 rubric')
            ->set('bodies', $bodies)
            ->call('store');

        $this->assertTrue(ModelsRubric::whereTitle('test A1')->exists());
    }

    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_update_form()
    {
        $this->signIn();
        $bodies[] = $this->body;
        Livewire::test(Rubric::class)
            ->set('title', 'test A1')
            ->set('description', 'test A1 rubric')
            ->set('bodies', $bodies)
            ->call('store');
        $rubric = ModelsRubric::first();
        $response = $this->get(route($this->route . '.edit', $rubric->id));
        $response->assertStatus(200);
    }

    /**
     * A basic test to delete method and response correctly.
     *
     * @return void
     */
    public function test_delete_form()
    {
        $this->signIn();
        $this->destroy();
    }
}
