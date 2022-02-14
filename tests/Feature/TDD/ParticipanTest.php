<?php

namespace Tests\Feature\Tdd;

use App\Http\Livewire\Container\Participant;
use App\Http\Requests\DepartmentRequest;
use App\Models\Term;
use Livewire\Livewire;
use Tests\BaseTest;


class ParticipanTest extends BaseTest
{

    protected function setUp(): void
    {
        
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('term');
        $this->setBaseModel('App\Models\Term');
    }

    

    /**
     * A basic test to check components retun currect data
     *
     * @return void
     */
    public function test_participanet(){
        $this->signIn();
        
        Livewire::test(Participant::class)
            ->assertSet('route', 'addQuestionToQuiz')
            ->assertSet('parent', Term::first()->id)
            ->assertSee('arash.aspx@gmail.com');
    }

}
