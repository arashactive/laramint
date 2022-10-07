<?php

namespace Tests\Feature\TDD;

use App\Http\Requests\FileRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\BaseTest;

class FileManagerTest extends BaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('file');
        $this->setBaseModel('App\Models\File');
       
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
        $this->setValidationRules((new FileRequest())->rules());
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
        Storage::disk('public')->put('avatar.txt', '');
        
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
        Storage::disk('public')->put('avatar.txt', '');
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
}
