<?php

namespace App\View\Components\Box\Mentor\Comments;

use App\Models\MentorComment;
use Illuminate\View\Component;

class Item extends Component
{

    public MentorComment $comment;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(MentorComment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.mentor.comments.item');
    }
}
