<?php

namespace App\View\Components\Modules\MentorComments;

use Illuminate\View\Component;

class NewComment extends Component
{
    public int $userId;
    public string $activableType;
    public int $activableId;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $userId, string $activableType, int $activableId)
    {

        $this->userId = $userId;
        $this->activableType = $activableType;
        $this->activableId = $activableId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.modules.mentor-comments.new-comment');
    }
}
