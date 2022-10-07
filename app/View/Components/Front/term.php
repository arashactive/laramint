<?php

namespace App\View\Components\Front;

use App\Models\Term as ModelsTerm;
use Illuminate\View\Component;

class term extends Component
{
    public ModelsTerm $term;
    public String $iteration;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsTerm $term, string $iteration = '')
    {
        $this->term = $term;
        $this->iteration = $iteration;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.term');
    }
}
