<?php

namespace App\Http\Livewire\Box;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class QuizActivity extends Component
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
        $quizes =  Quiz::paginate();
        return view('livewire.box.quiz-activity', compact([
            'quizes'
        ]));
    }
}
