<?php

namespace App\Http\Livewire\Interfaces;

interface CrudInterface{
    
    public function createModal();
    public function updateModal($id);
    public function read();
    public function deleteModal($id);
}
