<?php

namespace App\Http\Controllers\Education\Term;

use App\Http\Controllers\Controller;
use App\Http\Requests\TermRequest;
use App\Services\Back\Educations\TermAdminService;

class TermSessionController extends Controller
{

    protected $service;

    public function __construct(TermAdminService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int $term_id
     * @param  int $session_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store($term_id, $session_id)
    {
        $this->authorize('term.edit');
        $this->service->syncSessionTerm($term_id, $session_id);
        return $this->service->redirectBack();
    }

    /**
     * change the sequences of file belongs to document
     *
     * @param  int $term_id
     * @param  int $session_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($term_id, $session_id)
    {
        $this->authorize('term.delete');
        $this->service->detachSessionTerm($term_id, $session_id);
        return $this->service->redirectBack();
    }

    /**
     * change the sequences of file belongs to document
     *
     * @param  int $from
     * @param  string  $move
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function order($from, $move)
    {
        $this->authorize('term.update');
        $this->service->order($from, $move);
        return $this->service->redirectBack();
    }
}
