<?php

namespace Tests\Feature\TDD;

use Tests\BaseTest;

class QuestionTest extends BaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('question');
        $this->setBaseModel('App\Models\Question');
    }


    
    /**
     * A basic test to create form is worked correctly.
     *
     * @return void
     */
    public function test_create_form()
    {
        $this->signIn();
        $route = 'question';
        
        $response = $this->get(route($route. '.create'));
        $response->assertStatus(200);

        $response = $this->get(route($route. '.index'));
        $response->assertStatus(200);


        
    }


}
