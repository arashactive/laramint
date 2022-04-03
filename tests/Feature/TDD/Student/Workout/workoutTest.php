<?php

namespace Tests\Feature\TDD\Student\Workout;

use Tests\BaseTest;

class workoutTest extends BaseTest
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
