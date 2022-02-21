<?php

namespace App\Http\Livewire\Box;

use App\Models\Feedback;
use Livewire\Component;
use Livewire\WithPagination;

class FeedbackActivity extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $session;

    public function render()
    {
        $feedbacks =  Feedback::paginate();
        return view('livewire.box.feedback-activity', compact('feedbacks'));
    }
}
