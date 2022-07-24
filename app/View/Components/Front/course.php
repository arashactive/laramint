<?php

namespace App\View\Components\Front;

use App\Models\Course as ModelsCourse;
use Illuminate\View\Component;

class course extends Component
{
    public ModelsCourse $course;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsCourse $course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.course');
    }
}
