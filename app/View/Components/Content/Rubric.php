<?php

namespace App\View\Components\Content;

use App\Models\Rubric as ModelsRubric;
use Illuminate\View\Component;

class Rubric extends Component
{
    public ModelsRubric $rubric;
    public array $bodies = [];
    
    
    /**
     * Create a new component instance.
     * @param ModelsRubric $rubric
     * @return void
     */
    public function __construct(ModelsRubric $rubric)
    {
        $this->rubric = $rubric;
        $this->bodies = (array)json_decode($rubric->body, false);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.content.rubric');
    }
}
