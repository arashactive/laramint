<?php

namespace App\Http\Livewire\Admin\Configuration;

use App\Models\Configuration;
use Livewire\Component;

class SiteName extends Component
{

    public $config_value;


    protected $rules = [
        'config_value' => 'required',
    ];

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $config = Configuration::where('config_type', 'SiteName')
            ->first();


        if (!empty($config))
            $this->config_value = json_decode($config->config_value, true);
    }

    public function config_changed()
    {

        $this->validate();

        $config = Configuration::where('config_type', 'SiteName')
            ->first();

        $config->config_value = json_encode($this->config_value);
        $config->save();

        session()->flash('message', 'Item successfully updated.');
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.admin.configuration.site-name');
    }
}
