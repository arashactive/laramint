<?php

namespace Tests\Feature\TDD;

use App\Http\Requests\QuizRequest;
use Tests\BaseTest;

class QuizTest extends BaseTest
{
    protected function setUp() :void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('quiz');
        $this->setBaseModel('App\Models\Quiz');

        
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
        $this->setValidationRules((new QuizRequest())->rules());
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
