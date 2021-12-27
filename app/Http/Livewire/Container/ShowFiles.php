<?php

namespace App\Http\Livewire\Container;

use App\Models\File;
use Livewire\Component;

class ShowFiles extends Component
{

    public $search = '';

    public $route;
    public $document;
    

    public function render()
    {

        $search = '%' . $this->search . '%';
        $files = File::where('description', 'LIKE', '%' . $search . '%')
        ->orderby('updated_at', 'desc')
        ->paginate(env('PAGINATION'));

        return view('livewire.container.show-files',[
            'files' => $files
        ]);
    }
}
