<?php

namespace App\View\Components\Atoms;

use Illuminate\View\Component;

class Progress extends Component
{

    public string $color;
    public int $fill;
    public int $count;
    public int $width = 0;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $color, int $fill, int $count, int $width = 0)
    {
        $this->width = $width;
        $this->color = $color;
        $this->fill = $fill;
        $this->count = $count;

        $this->width = $this->calculatePercentage($count, $fill);
    }


    private function calculatePercentage(int $count, int $fill) :int
    {
        if ($count > 0 && $fill > 0) {
            $percentChange = (($count - $fill) / $count) * 100;
            return (int)(100 - round(abs($percentChange)));
        }

        return 0;
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
