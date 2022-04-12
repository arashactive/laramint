<?php

namespace App\View\Components\atoms;

use Illuminate\View\Component;

class progress extends Component
{

    public $color;
    public $fill;
    public $count;

    public $width;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color, $fill, $count)
    {
        $this->color = $color;
        $this->fill = $fill;
        $this->count = $count;

        $this->width = $this->calculatePercentage($count, $fill);
    }


    private function calculatePercentage($count, $fill)
    {
        $percentChange = (($count - $fill) / $count) * 100;
        return 100 - round(abs($percentChange));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.atoms.progress');
    }
}
