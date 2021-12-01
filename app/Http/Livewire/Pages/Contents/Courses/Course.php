<?php

namespace App\Http\Livewire\Pages\Contents\Courses;

use App\Http\Livewire\Interfaces\CrudInterface;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Course as ModelsCourse;
use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class Course extends Component implements CrudInterface
{
    use WithPagination, InteractsWithModal;

    /**
     * show Panel of creation
     *
     * @return void
     */
    public function createModal()
    {
        $this->cleanVars();
        
        // $this->modelFormVisible = true;
        
    }


    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateModal($id)
    {
        $this->reset();
        $this->modelId = $id;
        $this->modelFormVisible = true;
        $this->loadModel();
    }



     /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteModal($id)
    {
        //
    }


    /**
     * read function get all list of courses that before saved
     *
     * @return void
     */
    public function read()
    {
        return ModelsCourse::orderby('created_at', 'desc')->paginate(5);
    }

    /**
     * get list of any departments to assign course
     *
     * @return a list of departments to make a dropdown list
     */
    public function getDepartments()
    {
        return Department::all();
    }

    /**
     * render page to view
     *
     * @return void
     */
    public function render()
    {
        
        return view('livewire.basic.courses.course', [
            'departments' => $this->getDepartments(),
            'courses' => $this->read()
        ]);
    }
}