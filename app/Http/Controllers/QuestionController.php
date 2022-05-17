<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('question.index');
        $questions = Question::with('QuestionType')->orderby('created_at', 'desc')->paginate();
        return view("contents.admin.question.index", compact("questions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create(Request $request)
    {
        $this->authorize('question.create');
        $quiz = $request->quiz_id ? Quiz::findorfail($request->quiz_id) : null;
        return view('contents.admin.question.form', compact('quiz'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Question $question)
    {
        $this->authorize('question.edit');
        return view('contents.admin.question.form', compact(
            "question"
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Question $question)
    {
        $this->authorize('question.delete');

        $question->delete();
        return redirect()
            ->route("question.index")
            ->with('danger', __('question deleted successfully'));
    }
}
