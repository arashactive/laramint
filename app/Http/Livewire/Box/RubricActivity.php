<?php

namespace App\Http\Livewire\Box;

use App\Models\Rubric;
use Livewire\Component;
use Livewire\WithPagination;

class RubricActivity extends Component
{
    use WithPagination;

    public $session;

    public function render()
    {
        $rubrics = Rubric::paginate();
        return view('livewire.box.rubric-activity', compact('rubrics'));
    }
}
