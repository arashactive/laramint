<?php

namespace App\Http\Livewire\Container;

use App\Models\Document;
use App\Models\File;
use Livewire\Component;

class ShowFiles extends Component
{
    

    public string $search = '';

    public string $route;
    public int $document;
    

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
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
