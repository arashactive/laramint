<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class DropDown extends Component
{
    public $model = null;
    public $name = null;
    public $selected = 0;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model ,  $name , $selected = 0)
    {
        $model = "App\Models\\" . $model;
        $this->model =  $model::pluck('title', 'Id');
        $this->name = $name;
        $this->selected = $selected;
        
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
