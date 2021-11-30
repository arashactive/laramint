<?php

namespace App\Http\Livewire;

use App\Models\Course as ModelsCourse;
use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class Course extends Component
{
    use WithPagination;
    
    public $modalConfirmDeleteVisible = false;
    public $name;
    public $description;
    public $department_id;

    public $modelId;
    public $modelFormVisible = false;

    
    /**
     * any rules for create and update
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'department_id' => 'required|int|exists:departments,id'
        ];
    }

    /**
     * show Panel of creation
     *
     * @return void
     */
    public function createShowModel()
    {
        $this->cleanVars();
        $this->modelFormVisible = true;
    }


     /**
     * close Panel of creation
     *
     * @return void
     */
    public function closeModal()
    {
        $this->modelFormVisible = false;
    }

    
    /**
     * cleanVars is a function that clear any field
     *
     * @return void
     */
    public function cleanVars()
    {
        $this->name = null;
        $this->description = null;
        $this->description_id = null;
        $this->modelId = null;
    }
    

    public function modelData()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'department_id' => $this->department_id
        ];
    }

    /**
     * create function stores in database
     *
     * @return void
     */
    public function create()
    {
        $this->validate($this->rules());
        ModelsCourse::create($this->modelData());
        $this->cleanVars();
        $this->closeModal();
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = ModelsCourse::find($this->modelId);
        $this->name = $data->name;
        $this->description = $data->description;
        $this->department_id = $data->department_id;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->reset();
        $this->modelId = $id;
        $this->modelFormVisible = true;
        $this->loadModel();
    }
    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate($this->rules());
        ModelsCourse::find($this->modelId)->update($this->modelData());
        $this->modelFormVisible = false;

        $this->dispatchBrowserEvent('alert', [
            'type' => 'info',
            'message' => 'There is a department (' . $this->name . ') that has been updated!'
        ]);
    }
    

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;

        $this->modalConfirmDeleteVisible = true;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        ModelsCourse::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => 'There is a department that has been deleted!'
        ]);
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
     * @return void
     */
    public function getDepartments()
    {
        return Department::all();
    }

    public function render()
    {
        
        return view('livewire.basic.courses.course', [
            'departments' => $this->getDepartments(),
            'courses' => $this->read()
        ]);
    }
}