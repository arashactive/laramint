<?php

namespace App\Http\Livewire\Services\Mentors;

use App\Models\MentorComment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $activable_id;
    public $activable_type;
    public $userId;


    public function render()
    {
        $comments = MentorComment::where('user_id', $this->userId);
        if ($this->activable_id > 0 && $this->activable_type != "") {
            $comments = $comments->where('activable_type', $this->activable_type)
                ->where('activable_id', $this->activable_id);
        }
        $comments = $comments->orderby('created_at', 'desc')
            ->paginate(4);

        return view('livewire.services.mentors.comments', [
            'comments' => $comments
        ]);
    }
}
