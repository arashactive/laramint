<?php

namespace App\View\Components\Front;

use App\Models\Department as ModelsDepartment;
use Illuminate\View\Component;

class department extends Component
{
    public ModelsDepartment $department;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsDepartment $department)
    {
        $this->department = $department;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.department');
    }
}
