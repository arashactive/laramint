<?php

namespace App\View\Components\Modules\Terms;

use Illuminate\View\Component;
use App\Models\Term;

class All extends Component
{

    /**
     * terms
     *
     * @var Term[]
     */
    public $terms;

    /**
     * Create a new component instance.
     * @param Term[] $terms
     * @return void
     */
    public function __construct($terms)
    {
        $this->terms = $terms;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modules.terms.all');
    }
}
