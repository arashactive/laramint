<?php

namespace Tests\Feature;

use Tests\BaseTest;

class ActivityTest extends BaseTest
{

    protected function setUp() :void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('activity');
        $this->setBaseModel('App\Models\Activity');
 
    }


    /**
     * A basic test to check access level controller with without access to page
     *
     * @return void
     */
    public function test_acl()
    {
        $this->signIn(2);
        $this->withOutAccessLevel();
    }

    


}
