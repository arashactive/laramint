<?php

namespace App\Http\Controllers;


use App\Http\Requests\SessionRequest;
use App\Models\Session;
use App\Models\Sessionable;
use App\Traits\Sequence;

class SessionController extends Controller
{
    use Sequence;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('session.create');
        return view('contents.admin.session.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SessionRequest  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
     * @param  Session  $session
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @param  Session  $session
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
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
     * @param  SessionRequest  $request
     * @param  Session  $session
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
     * @param  Session  $session
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
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
     * @param  int $active_id
     * @param  mixed $session
     * @return void|null
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
     * @param  int  $active_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addDocumentToSession(Session $session, int $active_id)
    {
        $this->addActivityTosessio($session->documents(), $active_id, $session);
        return redirect()->back();
    }


    /**
     * Attach Document To Session
     *
     * @param  Session  $session
     * @param  int  $active_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addQuizToSession(Session $session, int $active_id)
    {
        $this->addActivityTosessio($session->Quizes(), $active_id, $session);
        return redirect()->back();
    }

    /**
     * Attach File To Session
     *
     * @param  Session  $session
     * @param  int  $active_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addFileToSession(Session $session, int $active_id)
    {
        $this->addActivityTosessio($session->Files(), $active_id, $session);
        return redirect()->back();
    }

    /**
     * Attach Document To Session
     *
     * @param  Session  $session
     * @param  int  $active_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addFeedbackToSession(Session $session, int $active_id)
    {
        $this->addActivityTosessio($session->Feedbacks(), $active_id, $session);
        return redirect()->back();
    }


    /**
     * Attach Document To Session
     *
     * @param  Session  $session
     * @param  int  $active_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addRubricToSession(Session $session, int $active_id)
    {
        $this->addActivityTosessio($session->Rubrics(), $active_id, $session);
        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to Sessionable
     *
     * @param  Sessionable  $from
     * @param  string  $move
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function changeOrderSessionable(Sessionable $from, string $move)
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
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteActivityAsSession($session_id)
    {
        Sessionable::findorfail($session_id)->delete();
        return redirect()->back()->with('danger', 'activity is deleted');
    }
}
