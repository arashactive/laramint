<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Members extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $modalFormVisible = false;


    public function showModalCreateMember()
    {
        $this->modalFormVisible = true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ];
    }

    public function createUser()
    {
        $this->validate($this->rules());
        User::create($this->modelData());
        $this->resetModal();
    }

    public function modelData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public function resetModal()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->modalFormVisible = !$this->modalFormVisible;
    }

    public function render()
    {
        return view('livewire.members');
    }
}
