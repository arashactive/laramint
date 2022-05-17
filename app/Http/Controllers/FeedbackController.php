<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\FeedbackQuestion;
use App\Models\Question;
use App\Traits\Sequence;

class FeedbackController extends Controller
{
    use Sequence;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('feedback.index');
        $feedbacks = Feedback::paginate();
        return view("contents.admin.feedback.index", compact("feedbacks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('feedback.create');
        return view('contents.admin.feedback.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FeedbackRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(FeedbackRequest $request)
    {
        $this->authorize('feedback.create');
        Feedback::create($request->all());
        return redirect()
            ->route("feedback.index")
            ->with('success', __('quiz created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Feedback $feedback
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Feedback $feedback)
    {
        $this->authorize('feedback.edit');
        return view('contents.admin.feedback.show', compact(
            "feedback"
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Feedback $feedback
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Feedback $feedback)
    {
        $this->authorize('feedback.edit');
        return view('contents.admin.feedback.form', compact(
            "feedback"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FeedbackRequest $request
     * @param  Feedback $feedback
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(FeedbackRequest $request, Feedback $feedback)
    {
        $this->authorize('feedback.edit');
        $feedback->update($request->all());
        return redirect()
            ->route("feedback.index")
            ->with('warning', __('feedback updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feedback $feedback
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Feedback $feedback)
    {
        $this->authorize('feedback.delete');
        $feedback->delete();
        return redirect()
            ->route("feedback.index")
            ->with('danger', __('feedback deleted successfully'));
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  FeedbackQuestion  $from
     * @param  string  $move
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function orderChangeQuestionFeedback(FeedbackQuestion $from, $move)
    {

        $this->authorize('feedback.update');
        $move_parameters = [
            'up' => ['char' => '<', 'order' => 'desc'],
            'down' => ['char' => '>', 'order' => 'asc']
        ];


        $to = FeedbackQuestion::where('feedback_id', $from->feedback_id)
            ->where('order', (string)$move_parameters[$move]['char'], $from->order)
            ->orderby('order', (string)$move_parameters[$move]['order'])
            ->first();
        
        $this->changeOrder($from, $to);

        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  Feedback $parent
     * @param  Question $question
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addQuestionToFeedback(Feedback $parent, Question $question)
    {
        $this->authorize('feedback.create');
        $parent->Questions()->attach(
            $question,
            ['order' => $parent->Questions()->max('order') + 1]
        );
        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  FeedbackQuestion  $feedbackQuestion
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteQuestionAsFeedback(FeedbackQuestion $feedbackQuestion)
    {
        $this->authorize('feedback.delete');
        $feedbackQuestion->delete();
        return redirect()->back();
    }

}
