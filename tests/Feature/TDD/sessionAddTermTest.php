<?php

namespace Tests\Feature\TDD;

use App\Models\Session;
use App\Models\Term;
use Tests\BaseTest;

class sessionAddTermTest extends BaseTest
{

    protected function setUp(): void
    {

        parent::setUp();
        $this->seed();

        $this->setBaseRoute('session');
        $this->setBaseModel('App\Models\Session');
    }

  
    /**
     * A basic test to check components retun currect data
     *
     * @return void
     */
    public function test_add_session_to_term()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $this->create([], 'term.store');
        $this->create([], 'session.store');

        $term = Term::first();
        $session = Session::first();

        $response = $this->get(route('addSessionToTerm',[
            'term' => $term->id,
            'session' => $session->id
        ]));
        
        $response->assertRedirect();

    }

    

}
