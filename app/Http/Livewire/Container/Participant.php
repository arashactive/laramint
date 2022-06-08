<?php

namespace App\Http\Livewire\Container;

use App\Models\Participant as ModelsParticipant;
use App\Models\Role;
use App\Models\Term;
use App\Models\User;
use Livewire\Component;

class Participant extends Component
{

    public string $search = '';

    public Term $term;

    public function mount(Term $term)
    {
        $this->termUpdated();
    }

    public function addParticipantToTerm(User $user, Role $role)
    {
        $this->term->participants()->attach($user, ['role_id' => $role->id]);
        $this->termUpdated();
    }

    public function deleteParticipantAsTerm(ModelsParticipant $participant){
        $participant->delete();
        $this->termUpdated();
    }

    public function termUpdated()
    {
        $this->term = Term::with('Participants')->find($this->term->id);
    }

    


    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $search = '%' . $this->search . '%';
        $users = User::where('name', 'LIKE', $search)
            ->orWhere('email', 'LIKE', $search)
            ->orderby('updated_at', 'desc')
            ->paginate();

        return view('livewire.container.participant', compact("users"));
    }
}
