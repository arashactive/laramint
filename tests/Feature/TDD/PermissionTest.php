<?php

namespace Tests\Feature\TDD;

use App\Http\Requests\PermissionRequest;
use Tests\BaseTest;

class PermissionTest extends BaseTest
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('permission');
        $this->setBaseModel('App\Models\Permission');
        $this->setField('name');
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
        $this->setValidationRules((new PermissionRequest())->rules());
        $this->signIn();
        $this->validation();
    }



    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form()
    {
        $this->signIn();
        $this->create();
    }

    /**
     * A basic test to update method with authenticated verfied.
     *
     * @return void
     */
    public function test_update_form()
    {
        $this->signIn();
        $this->update();
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


    /**
     * A basic test to delete method and response correctly.
     *
     * @return void
     */
    public function test_delete_with_child_form()
    {
        $this->signIn();
        $this->destroy();
    }
}
