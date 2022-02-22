<?php

namespace Tests\Feature\Tdd;

use App\Http\Livewire\Container\Participant;
use App\Models\Term;
use App\Models\User;
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
    public function test_participanet()
    {
        $this->signIn();

        Livewire::test(Participant::class, [
            'parent' => Term::first()->id,
            'route' => 'addParticipantToTerm'
        ])->assertSee(User::first()->email);
    }

    /**
     * A basic test to check components retun currect data
     *
     * @return void
     */
    public function test_add_participant_to_term()
    {
        $this->signIn();

        $user = User::first();
        $role_id = $user->Roles->first()->id;
        $term = Term::first();

        $term->Participants()->detach($user);
        

        $response = $this->get(route('addParticipantToTerm',[
            'term_id' => $term->id,
            'user_id' => $user->id,
            'role_id' => $role_id
        ]));

        $response->assertRedirect(route('term.show', $term->id));
        $this->followRedirects($response)->assertSee('successfull added');
    }


    /**
     * A basic test to check components retun currect data
     *
     * @return void
     */
    public function test_duplicated_error_participant_to_term()
    {
        $this->signIn();

        $user = User::first();
        $role_id = $user->Roles->first()->id;
        $term = Term::first();

        $response = $this->get(route('addParticipantToTerm',[
            'term_id' => $term->id,
            'user_id' => $user->id,
            'role_id' => $role_id
        ]));

        $response = $this->get(route('addParticipantToTerm',[
            'term_id' => $term->id,
            'user_id' => $user->id,
            'role_id' => $role_id
        ]));

        $response->assertRedirect(route('term.show', $term->id));
        $this->followRedirects($response)->assertSee('user is exist');
    }

}
