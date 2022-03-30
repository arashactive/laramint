<?php

namespace Tests\Feature\TDD\Front;

use Tests\BaseTest;

class WelcomeTest extends BaseTest
{


    protected function setUp(): void
    {

        parent::setUp();
        $this->seed();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homePage_valid()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
