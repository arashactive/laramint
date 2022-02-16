<?php

namespace App\Http\Controllers;


use App\Http\Requests\SessionRequest;
use App\Models\Session;
use App\Models\Sessionable;
use App\traits\Sequence;

class SessionController extends Controller
{
    use Sequence;

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
            ->with('success', __('item created successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        $this->authorize('session.edit');
        $session->with('related');
        return view('contents.admin.session.show', compact(
            "session"
        ));
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
        return view('contents.admin.session.form', compact(
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
            ->with('warning', __('item updated successfully'));
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
            ->with('danger', __('item deleted successfully'));
    }

    
    /**
     * addActivityTosessio
     *
     * @param  mixed $activity
     * @param  mixed $active_id
     * @return void
     */
    private function addActivityTosessio($activity, $active_id, $session)
    {
        return $activity->attach(
            $active_id,
            ['order' => $session->Sessionable()->max('order') + 1]
        );
    }

    /**
     * Attach Document To Session
     *
     * @param  Session  $session
     * @param  id  $active_id
     * @return \Illuminate\Http\Response redirect
     */
    public function addDocumentToSession(Session $session, $active_id)
    {
        $this->addActivityTosessio($session->documents(), $active_id, $session);
        return redirect()->back();
    }


    /**
     * Attach Document To Session
     *
     * @param  Session  $session
     * @param  id  $quiz_id
     * @return \Illuminate\Http\Response redirect
     */
    public function addQuizToSession(Session $session, $active_id)
    {
        $this->addActivityTosessio($session->Quizes(), $active_id, $session);
        return redirect()->back();
    }


    /**
     * Attach Document To Session
     *
     * @param  Session  $session
     * @param  id  $quiz_id
     * @return \Illuminate\Http\Response redirect
     */
    public function addFeedbackToSession(Session $session, $active_id)
    {
        $this->addActivityTosessio($session->Feedbacks(), $active_id, $session);
        return redirect()->back();
    }

    
    /**
     * Attach Document To Session
     *
     * @param  Session  $session
     * @param  id  $quiz_id
     * @return \Illuminate\Http\Response redirect
     */
    public function addRubricToSession(Session $session, $active_id)
    {
        $this->addActivityTosessio($session->Rubrics(), $active_id, $session);
        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to Sessionable
     *
     * @param  Sessionable  $from
     * @param  string  $move => up or down
     * @return \Illuminate\Http\Response
     */
    public function changeOrderSessionable(Sessionable $from, $move)
    {
        $this->authorize('session.order');

        $move_parameters = [
            'up' => ['char' => '<', 'order' => 'desc'],
            'down' => ['char' => '>', 'order' => 'asc']
        ];

        $to = Sessionable::where('session_id', $from->session_id)
            ->where('order', (string)$move_parameters[$move]['char'], $from->order)
            ->orderby('order', (string)$move_parameters[$move]['order'])
            ->first();

        $this->changeOrder($from, $to);

        return redirect()->back();
    }

    
    /**
     * deleteActivityAsSession
     *
     * @param  mixed $session_id
     * @return void
     */
    public function deleteActivityAsSession($session_id)
    {
        Sessionable::findorfail($session_id)->delete();
        return redirect()->back()->with('danger', 'activity is deleted');
    }



    public function addSessionToTerm($term_id, $session_id){
        
    }

}
