<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class DropDown extends Component
{    
    /**
     * model
     *
     * @var \Illuminate\Support\Collection<int, mixed>
     */
    public $model;
    public string $name;
    public int $selected = 0;
    public string $field = 'title';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $model, string $name, int $selected = 0, string $filed = "title")
    {
        
        $model = "App\Models\\" . $model;
        $this->model =  $model::pluck($filed, 'Id');
        $this->name = $name;
        $this->selected = $selected;
        $this->field = $filed;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {


        return view('components.forms.drop-down');
    }
}
