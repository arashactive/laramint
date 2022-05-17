<?php

namespace App\View\Components\Modules\Terms;

use App\Models\Term;
use Illuminate\View\Component;

class All extends Component
{

    public $terms;

    /**
     * Create a new component instance.
     *
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
