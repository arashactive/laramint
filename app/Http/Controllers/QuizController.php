<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Traits\Sequence;

class QuizController extends Controller
{
    use Sequence;

    protected array $show_question = [
        'StepByStep', 'OnePage'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('quiz.index');
        $quizes = Quiz::paginate();
        return view("contents.admin.quiz.index", compact("quizes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('quiz.create');
        $show_question = $this->show_question;
        return view('contents.admin.quiz.form', compact('show_question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuizRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(QuizRequest $request)
    {
        $this->authorize('quiz.create');
        Quiz::create($request->all());
        return redirect()
            ->route("quiz.index")
            ->with('success', __('quiz created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Quiz $quiz
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Quiz $quiz)
    {
        $this->authorize('quiz.edit');
        return view('contents.admin.quiz.show', compact(
            "quiz"
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Quiz $quiz
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Quiz $quiz)
    {
        $this->authorize('quiz.edit');
        $show_question = $this->show_question;
        return view('contents.admin.quiz.form', compact(
            "quiz",
            "show_question"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  QuizRequest $request
     * @param  Quiz $quiz
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(QuizRequest $request, Quiz $quiz)
    {
        $this->authorize('quiz.edit');
        $quiz->update($request->all());
        return redirect()
            ->route("quiz.index")
            ->with('warning', __('quiz updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Quiz $quiz
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Quiz $quiz)
    {
        $this->authorize('quiz.delete');
        try {
            $quiz->delete();
            return redirect()
                ->route("quiz.index")
                ->with('danger', __('item deleted successfully'));
        } catch (\Exception $e) {
            return redirect()
                ->route("quiz.index")
                ->with('danger', __('Delete is not Completed, Please check child of this quiz'));
        }
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  QuizQuestion $from
     * @param  string  $move
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function orderChangeQuestion(QuizQuestion $from, $move)
    {

        $this->authorize('quiz.update');
        $move_parameters = [
            'up' => ['char' => '<', 'order' => 'desc'],
            'down' => ['char' => '>', 'order' => 'asc']
        ];


        $to = QuizQuestion::where('quiz_id', $from->quiz_id)
            ->where('order', (string)$move_parameters[$move]['char'], $from->order)
            ->orderby('order', (string)$move_parameters[$move]['order'])
            ->first();

        $this->changeOrder($from, $to);

        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  Quiz  $parent
     * @param  Question  $question
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addQuestionToQuiz(Quiz $parent, Question $question)
    {
        $this->authorize('quiz.create');
        $parent->Questions()->attach(
            $question,
            ['order' => $parent->Questions()->max('order') + 1]
        );
        return redirect()->back();
    }


    /**
     * change the sequences of file belongs to document
     *
     * @param  QuizQuestion  $quizQuestion
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteQuestionAsQuiz(QuizQuestion $quizQuestion)
    {
        $this->authorize('quiz.delete');
        $quizQuestion->delete();
        return redirect()->back();
    }
}
