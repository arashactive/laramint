<?php

namespace App\Http\Livewire\Admin\Configuration\Coins;

use App\Models\Configuration;
use Livewire\Component;

class ScoreToCoins extends Component
{

    public int $config_value;
    private string $typeName = 'ScoreToCoins';

    protected $rules = [
        'config_value' => 'required',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(): void
    {
        $this->config_value = (int)Configuration::where('config_type', $this->typeName)
            ->first()->config_value;
    }

    public function convertScoreToCoins(): void
    {

        $this->validate();

        $config = Configuration::where('config_type', $this->typeName)
            ->first();

        $config->config_value = $this->config_value;
        $config->save();

        session()->flash('message', __('message/alert.update', ["subject" => 'Coins']));
    }


    public function render()
    {
        return view('livewire.admin.configuration.coins.score-to-coins');
    }
}
