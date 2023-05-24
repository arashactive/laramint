<?php

namespace App\Http\Controllers\Education\Term;

use App\Http\Controllers\Controller;
use App\Http\Requests\TermRequest;
use App\Services\Back\Educations\TermAdminService;

class TermController extends Controller
{

    protected $service;

    public function __construct(TermAdminService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('term.index');
        $terms = $this->service->index();
        return $this->service->view('index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('term.create');
        return $this->service->view('form', $this->service->create());
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
        $this->service->store($request->all());
        return $this->service->redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $term_id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show($term_id)
    {
        $this->authorize('term.show');
        return $this->service->view('show', $this->service->edit($term_id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $term_id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($term_id)
    {
        $this->authorize('term.edit');
        $this->authorize('view', $this->service->findById($term_id));
        return $this->service->view('form', $this->service->edit($term_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TermRequest $request
     * @param  int  $term_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(TermRequest $request, $term_id)
    {
        $this->authorize('term.edit');
        $this->authorize('view', $this->service->findById($term_id));
        $this->service->update($request->all(), $term_id);
        return $this->service->redirect('warning');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $term_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($term_id)
    {
        $this->authorize('term.delete');
        $this->authorize('view', $this->service->findById($term_id));
        if ($this->service->destroy($term_id))
            return $this->service->redirect('warning');
    }


   
}
