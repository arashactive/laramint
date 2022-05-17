<?php

namespace App\Http\Controllers;

use App\Http\Requests\TermRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Session;
use App\Models\session_term;
use App\Models\Term;
use App\Traits\Sequence;

class TermController extends Controller
{

    use Sequence;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('term.index');
        
        $terms = Term::with('Participants')
        ->getParticipants()
        ->paginate();

        return view("contents.admin.term.index", compact("terms"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('term.create');
        $departments = $this->getDepartmentsPluck(Department::class);
        $courses = $this->getDepartmentsPluck(Course::class);
        return view('contents.admin.term.form', compact(
            'departments',
            'courses'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TermRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(TermRequest $request)
    {
        $this->authorize('term.create');
        Term::create($request->all());
        return redirect()
            ->route("term.index")
            ->with('success', __('item created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Term  $term
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Term $term)
    {       
        $this->authorize('term.show');   
              
    
        $departments = $this->getDepartmentsPluck(Department::class);
        $courses = $this->getDepartmentsPluck(Course::class);
        return view('contents.admin.term.show', compact(
            "term",
            "departments",
            'courses'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Term  $term
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Term $term)
    {
        $this->authorize('term.edit');
        $this->authorize('view', $term);
        $departments = $this->getDepartmentsPluck(Department::class);
        $courses = $this->getDepartmentsPluck(Course::class);
        return view('contents.admin.term.form', compact(
            "term",
            "departments",
            'courses'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TermRequest $request
     * @param  Term  $term
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(TermRequest $request, Term $term)
    {
        $this->authorize('term.edit');
        $this->authorize('view', $term);
        $term->update($request->all());
        return redirect()
            ->route("term.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Term  $term
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Term $term)
    {
        $this->authorize('term.delete');
        $this->authorize('view', $term);
        $term->delete();
        return redirect()
            ->route("term.index")
            ->with('danger', __('item deleted successfully'));
    }


    private function getDepartmentsPluck($model)
    {
        return $model::pluck('title', 'id');
    }

    /**
     * Attach Session To Term
     *
     * @param  Term  $term
     * @param  Session  $session
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addSessionToTerm(Term $term, Session $session)
    {
        $this->authorize('term.edit');
        $term->Sessions()->sync([$session->id => [
            'order' => $term->Sessions()->max('order') + 1
        ]], false);


        return redirect(route('term.show', $term->id))->with('success', 'session sync with this term');
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  Term $term
     * @param  Session  $session
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteSessionAsTerm(Term $term, Session $session)
    {
        $this->authorize('term.delete');
        $term->Sessions()->detach($session->id);
        return redirect()->back()->with('danger', 'session is detached');
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  session_term  $from
     * @param  string  $move
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function orderChangeSession(session_term $from, $move)
    {

        $this->authorize('term.update');
        $move_parameters = [
            'up' => ['char' => '<', 'order' => 'desc'],
            'down' => ['char' => '>', 'order' => 'asc']
        ];

        $to = session_term::where('term_id', $from->term_id)
            ->where('order', (string)$move_parameters[$move]['char'], $from->order)
            ->orderby('order', (string)$move_parameters[$move]['order'])
            ->first();


        $this->changeOrder($from, $to);

        return redirect()->back();
    }
}
