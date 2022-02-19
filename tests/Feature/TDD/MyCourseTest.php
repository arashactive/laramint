<?php

namespace Tests\Feature\TDD;

use Tests\BaseTest;

class MyCourseTest extends BaseTest
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('myCourse');
        $this->setBaseModel('App\Models\Term');
       
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
    
}
