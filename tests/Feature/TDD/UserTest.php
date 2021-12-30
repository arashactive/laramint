<?php

namespace Tests\Feature\TDD;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BaseTest;

class UserTest extends BaseTest
{

    use RefreshDatabase;
    public $attributes = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('user');
        $this->setBaseModel('App\Models\User');

        $this->setAttribute();
    }


    private function setAttribute()
    {
        $this->attributes = User::factory()->make([
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
    }

    /**
     * A basic test to check access level controller with without access to page
     *
     * @return void
     */
    public function test_acl()
    {
        $this->withOutPermissionUser();
        $this->withOutAccessLevel();
    }


    /**
     * A basic test to validation is worked.
     *
     * @return void
     */
    public function test_validation()
    {
        $this->setValidationRules((new UserRequest())->rules());
        $this->signIn();
        $this->validation((array)$this->attributes);
    }



    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form()
    {
        $this->handleValidationExceptions();

        $this->signIn();
        $user = [
            'name' => 'testForm',
            'email' => 'test@testtest.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $this->post(route('user.store'), $user)->assertRedirect();
        $this->assertDatabaseHas(User::class, ['name' => 'testForm']);
    }

    /**
     * A basic test to update method with authenticated verfied.
     *
     * @return void
     */
    public function test_update_form()
    {
        $this->signIn();
        
        $user = User::factory()->create();
        $updateUser = [
            'name' => 'updated user',
            'email' => 'updated@user.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $this->put(route('user.update', $user->id), $updateUser)->assertRedirect();
        $this->assertDatabaseHas(User::class, ['name' => 'updated user' , 'email' => 'updated@user.com']);

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
