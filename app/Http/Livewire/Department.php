<?php

namespace App\Http\Livewire;

use App\Models\Department as ModelsDepartment;
use App\Traits\CrudTrait;
use Livewire\Component;
use Livewire\WithPagination;

class Department extends Component
{
    use CrudTrait, WithPagination;

    public $modalConfirmDeleteVisible = false;
    public $name;
    public $description;
    public $modelId;
    public $modelFormVisible = false;

    public function createShowModel(){
        $this->cleanVars();
        $this->modelFormVisible = true;
    }

    public function closeModal(){
        $this->modelFormVisible = false;
    }


    public function rules(){
        return [
            'name' => 'required',
        ];
    }


    public function read(){
        return ModelsDepartment::paginate(5);
    }


     /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate($this->rules());
        ModelsDepartment::find($this->modelId)->update($this->modelData());
        $this->modelFormVisible = false;

        $this->dispatchBrowserEvent('alert',[
            'type'=>'info',
            'message'=>'There is a department (' . $this->name . ') that has been updated!'
        ]);

       
    }

     /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        ModelsDepartment::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>'There is a department that has been deleted!'
        ]);

        
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
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = ModelsDepartment::find($this->modelId);
        $this->name = $data->name;
        $this->description = $data->description;
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

    public function create(){
        $this->validate($this->rules());
        ModelsDepartment::create($this->modelData());
        $this->cleanVars();
        $this->closeModal();
        
    }


    public function modelData(){
        return [
            'name' => $this->name,
            'description' => $this->description
        ];
    }

    public function cleanVars(){
        $this->name = null;
        $this->description = null;
        $this->modelId = null;
    }

    public function render()
    {
        return view('livewire.basic.department.department', [
            'departments' => $this->read()
        ]);
    }
}
