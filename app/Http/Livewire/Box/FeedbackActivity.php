<?php

namespace App\Http\Livewire\Box;

use App\Models\Feedback;
use Livewire\Component;
use Livewire\WithPagination;

class FeedbackActivity extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';
    
    public $session;

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $feedbacks =  Feedback::paginate();
        return view('livewire.box.feedback-activity', compact('feedbacks'));
    }
}
