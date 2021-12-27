<?php

namespace App\View\Components\Container;

use Illuminate\View\Component;
use App\Models\File;

class FileManager extends Component
{

    public $files = null;
    public $route = null;
    public $document = null;
    public $search = null;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($document, $route)
    {

        $this->document = $document;
        $this->route = $route;
        
        $this->files = File::where('description', 'LIKE', '%' . $this->search . '%')
            ->orderby('updated_at', 'desc')
            ->paginate(env('PAGINATION'));
    }

   

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.container.file-manager');
    }
}
