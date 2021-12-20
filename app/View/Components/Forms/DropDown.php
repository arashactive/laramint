<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class DropDown extends Component
{
    public $model = null;
    public $name = null;
    public $selected = 0;
    public $field = 'title';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model,  $name, $selected = 0, $filed = "title")
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
