<?php

namespace App\Http\Livewire\Container;

use App\Models\Question;
use Livewire\Component;

class ShowQuestions extends Component
{
    public $search = '';

    public $route;
    public $quiz;

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
