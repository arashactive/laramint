<?php

namespace App\View\Components\box;

use Illuminate\View\Component;

class StudentCoursesForAdmin extends Component
{
    public $term;
    public $user;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($term, $user)
    {
        $this->term = $term;
        
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.student-courses-for-admin');
    }
}
