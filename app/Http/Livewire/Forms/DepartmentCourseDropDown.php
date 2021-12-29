<?php

namespace App\Http\Livewire\Forms;

use App\Models\Course;
use App\Models\Department;
use Livewire\Component;

class DepartmentCourseDropDown extends Component
{
    public $courses = [];
    public $departments = [];
    public $department_id = null;
    public $course_id = 0;
    

    public function mount()
    {
        $this->departments = Department::all();
        $this->courses = Course::where('department_id' , $this->department_id)->get();
    }


    public function selectDepartment()
    {
        $this->courses = Course::where('department_id' , $this->department_id)->get();
    }

    public function render()
    {
        return view('livewire.forms.department-course-drop-down');
    }
}
