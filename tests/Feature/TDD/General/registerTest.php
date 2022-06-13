<?php

namespace Tests\Feature\TDD\General;

use Tests\BaseTest;

class registerTest extends BaseTest
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('activity');
        $this->setBaseModel('App\Models\Activity');
    }


    public function test_it_can_register_a_new_user()
    {
        $user =  [
            'name' => 'Test User',
            'email' => 'test@user.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];
        $this->post('/register', $user);

        $this->assertDatabaseHas('users', [
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }


    public function test_register_a_new_user_get_coins()
    {

        $this->test_it_can_register_a_new_user();

        $this->assertDatabaseCount('coins_logs', 1);
    }
}
