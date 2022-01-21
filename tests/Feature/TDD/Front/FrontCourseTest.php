<?php

namespace Tests\Feature\TDD\Front;

use Tests\BaseTest;

class FrontCourseTest extends BaseTest
{

    protected function setUp() :void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('front/courses');
        $this->setBaseModel('App\Models\Courses');
 
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_courses_front_shows()
    {
        $this->withoutExceptionHandling();
        
        $response = $this->get('/front/courses');
        $response->assertStatus(200);
    }
}
