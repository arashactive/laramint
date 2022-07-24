<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Show extends Component
{
    public int $itemId;
    public string $path;
    public string $text = 'Show';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $itemId, string $path, string $text = "Show")
    {
        $this->itemId = $itemId;
        $this->path = $path;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.show');
    }
}
