<?php

namespace App\Http\Livewire\Services\Mentors;

use App\Models\MentorComment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public int $activable_id;
    public string $activable_type;
    public int $userId;


    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
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
