<?php

namespace App\View\Components\modules\mentorComments;

use Illuminate\View\Component;

class NewComment extends Component
{
    public $userId;
    public $activableType;
    public $activableId;
    
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userId, $activableType, $activableId)
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
