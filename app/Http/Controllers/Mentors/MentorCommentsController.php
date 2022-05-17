<?php

namespace App\Http\Controllers\Mentors;

use App\Events\CommentCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\MentorCommentsRequest;
use App\Models\MentorComment;
use Illuminate\Support\Facades\Auth;

class MentorCommentsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  MentorCommentsRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(MentorCommentsRequest $request)
    {
        $mentor = MentorComment::create(array_merge($request->all(), ['mentor_id' => Auth::user()->id]));

        event(new CommentCreated($mentor));

        return redirect()->back()->with('msg-success', 'success');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param MentorComment $comment
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(MentorComment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('danger', 'Item deleted successfully.');
    }
}
