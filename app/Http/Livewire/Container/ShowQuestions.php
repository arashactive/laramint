<?php

namespace App\Http\Livewire\Container;

use App\Models\Question;
use Livewire\Component;

class ShowQuestions extends Component
{
    public string $search = '';

    public string $route;
    public string $parent;


    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $search = '%' . $this->search . '%';
        $questions = Question::where('title', 'LIKE', '%' . $search . '%')
            ->orderby('updated_at', 'desc')
            ->paginate();

        return view('livewire.container.show-questions', [
            'questions' => $questions
        ]);
    }
}
