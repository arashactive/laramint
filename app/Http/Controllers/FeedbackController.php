<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\FeedbackQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('feedback.create');
        return view('contents.admin.feedback.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
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
     * @param  int  $file_id
     * @param  string  $move
     * @return \Illuminate\Http\Response
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
     * @param  int  $file_id
     * @param  string  $move
     * @return \Illuminate\Http\Response
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
     * @param  int  $file_id
     * @param  string  $move
     * @return \Illuminate\Http\Response
     */
    public function deleteQuestionAsFeedback(FeedbackQuestion $feedbackQuestion)
    {
        $this->authorize('feedback.delete');
        $feedbackQuestion->delete();
        return redirect()->back();
    }

}
