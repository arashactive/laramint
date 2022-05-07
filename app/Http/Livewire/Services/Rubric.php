<?php

namespace App\Http\Livewire\Services;

use App\Models\Rubric as ModelsRubric;
use Livewire\Component;

class Rubric extends Component
{

    private $body = [
        'item_title' => '',
        'cells' => [
            ['title' => '', 'score' => 0, 'pass_score' => false],
            ['title' => '', 'score' => 1, 'pass_score' => false],
            ['title' => '', 'score' => 2, 'pass_score' => false],
        ]
    ];

    public $rubric_id = null;
    public $title, $description;
    public $bodies;


    protected $rules = [
        'title' => 'required|min:6',
        'description' => 'required',
    ];

    public function mount()
    {
        
        $this->bodies[] = $this->body;

        if ($this->rubric_id != null) {
            $rubric = ModelsRubric::findorfail($this->rubric_id);
            $this->title = $rubric->title;
            $this->description = $rubric->description;
            $this->bodies = json_decode($rubric->body, true);
        }
        
    }


    public function addNewBody()
    {
        $this->bodies[] = $this->body;
    }


    public function removeBody($index)
    {
        unset($this->bodies[$index]);
        $this->bodies = array_values($this->bodies);
    }

    public function addCell($index)
    {
        $this->bodies[$index]['cells'][] = ['title' => '', 'score' => 0, 'pass_score' => false];
        $this->bodies = array_values($this->bodies);
    }

    public function store()
    {

        $this->validate();

        ModelsRubric::updateOrCreate([
            'id' => $this->rubric_id
        ], [
            'title' => $this->title,
            'description' => $this->description,
            'body' => json_encode($this->bodies)
        ]);

        return redirect()->route('rubric.index')->with('success', 'rubric updated');

    }

    public function render()
    {
        return view('livewire.services.rubric');
    }
}
