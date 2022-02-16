<?php

namespace Tests\Feature\TDD;

use App\Http\Livewire\Container\SessionPanel;
use App\Models\Session;
use App\Models\Term;
use Livewire\Livewire;
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
    public function test_container_sessions()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $this->create([],  'session');
        Livewire::test(SessionPanel::class, [
            'parent' => Term::first()->id,
            'route' => 'addSessionToTerm'
        ])->assertSee(Session::first()->title);
    }
}
