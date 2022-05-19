<?php

namespace App\Http\Livewire\Services;

use App\Models\Rubric as ModelsRubric;
use Livewire\Component;

class Rubric extends Component
{

    private array $body = [
        'item_title' => '',
        'cells' => [
            ['title' => '', 'score' => 0, 'pass_score' => false],
            ['title' => '', 'score' => 1, 'pass_score' => false],
            ['title' => '', 'score' => 2, 'pass_score' => false],
        ]
    ];

    public int $rubric_id = 0;
    public ?string $title = null;
    public ?string $description = null;
    public array $bodies;


    protected array $rules = [
        'title' => 'required|min:6',
        'description' => 'required',
    ];

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {

        $this->bodies[] = $this->body;

        if ($this->rubric_id > 0) {
            $rubric = ModelsRubric::findorfail($this->rubric_id);
            $this->title = $rubric->title;
            $this->description = $rubric->description;
            $this->bodies = json_decode($rubric->body, true);
        }
    }


    /**
     * addNewBody
     *
     * @return void
     */
    public function addNewBody()
    {
        $this->bodies[] = $this->body;
    }


    /**
     * removeBody
     *
     * @param  mixed $index
     * @return void
     */
    public function removeBody($index)
    {
        unset($this->bodies[$index]);
        $this->bodies = array_values($this->bodies);
    }

    /**
     * addCell
     *
     * @param  mixed $index
     * @return void
     */
    public function addCell($index)
    {
        $this->bodies[$index]['cells'][] = ['title' => '', 'score' => 0, 'pass_score' => false];
        $this->bodies = array_values($this->bodies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.services.rubric');
    }
}
