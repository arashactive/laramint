<?php

namespace App\View\Components\box;

use Illuminate\View\Component;

class CourseItemWithProgressTheme extends Component
{
    
    
    public $term;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($term)
    {
        $this->term = $term;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.course-item-with-progress-theme');
    }
}
