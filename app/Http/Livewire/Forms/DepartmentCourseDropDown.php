<?php

namespace App\Http\Livewire\Forms;

use App\Models\Course;
use App\Models\Department;
use Livewire\Component;

class DepartmentCourseDropDown extends Component
{    

    public $courses = [];

    public $departments = [];

    public ?int $department_id = null;
    public ?int $course_id = 0;


    public function mount(): void
    {
        
        $this->departments = Department::all();
        $this->courses = Course::where('department_id', $this->department_id)->get();
    }


    public function selectDepartment(): void
    {
        $this->courses = Course::where('department_id', $this->department_id)->get();
    }

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.forms.department-course-drop-down');
    }
}
