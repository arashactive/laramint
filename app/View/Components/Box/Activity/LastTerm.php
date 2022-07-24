<?php

namespace App\View\Components\Box\Activity;

use App\Models\Term;
use Illuminate\View\Component;

class LastTerm extends Component
{
    public ?Term $term;

    /**
     * __construct
     *
     * @param  Term|null $term
     * @return void
     */
    public function __construct(Term $term = null)
    {
        if (!empty($term))
            $this->term = $term;

        $this->term = null;    

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.activity.last-term');
    }
}
