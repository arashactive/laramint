<?php

namespace App\Http\Controllers;


use App\Http\Requests\SessionRequest;
use App\Models\Session;

class SessionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('session.index');
        $sessions = Session::paginate(env('PAGINATION'));
        return view("contents.admin.session.index", compact("sessions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('session.create');
        return view('contents.admin.session.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRequest $request)
    {
        $this->authorize('session.create');
        Session::create($request->all());
        return redirect()
            ->route("session.index")
            ->with('success' , __('item created successfully'));

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        $this->authorize('session.edit');
        return view('contents.admin.session.form' , compact(
            "session"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SessionRequest $request, Session $session)
    {
        $this->authorize('session.edit');
        $session->update($request->all());
        return redirect()
                ->route("session.index")
                ->with('warning' , __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $this->authorize('session.delete');
        $session->delete();
        return redirect()
                ->route("session.index")
                ->with('danger' , __('item deleted successfully'));
    }


}
