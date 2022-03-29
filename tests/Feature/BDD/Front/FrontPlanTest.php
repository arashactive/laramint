<?php

namespace Tests\Feature\BDD\Front;

use Tests\BaseTest;

class FrontPlanTest extends BaseTest
{
    protected function setUp(): void
    {

        parent::setUp();
        $this->seed();
    }


    /**
     * check plan route is available.
     *
     * @return void
     */
    public function test_plan_is_available()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('front.plans'));

        $response->assertStatus(200);
    }


    /**
     * check plan login button when user is not authenticate
     *
     * @return void
     */
    public function test_plan_button_login_guest()
    {
        
        $this->withoutExceptionHandling();
        $response = $this->get(route('front.plans'));

        $response->assertSeeText('Login ', $escaped = true);

    }

     /**
     * check plan login button when user is not authenticate
     *
     * @return void
     */
    public function test_plan_button_add_guest()
    {
        
        $this->withoutExceptionHandling();
        $this->signIn();
        $response = $this->get(route('front.plans'));
        
        $response->assertSeeText('Add ', $escaped = true);

    }
}
