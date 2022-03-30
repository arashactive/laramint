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
     * A basic feature test example.
     *
     * @return void
     */
    public function test_myCourse()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
    
    
    
}
