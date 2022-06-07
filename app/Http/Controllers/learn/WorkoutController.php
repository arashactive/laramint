<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Question;
use App\Models\Sessionable;
use App\Models\Workout;
use App\Utility\Modules\Tasks\TaskFactory;
use App\Utility\Question\QuestionFactory;
use App\Utility\Workout\WorkoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function prepared(Participant $participant, Sessionable $sessionable)
    {

        WorkoutService::WorkOutSyncForThisExcersice($participant, $sessionable, Auth::user());

        return redirect(route('taskLearner', ['participant' => $participant, 'sessionable' => $sessionable]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function task(Participant $participant, Sessionable $sessionable)
    {
        
        $className = $sessionable->sessionable_type;
        
        $task = TaskFactory::Build($className);
        $task->set_user(Auth::user());
        return $task->Render($participant, $sessionable);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function completedAndNext(Workout $workout)
    {
        if ($workout->is_completed == 0)
            $workout->Completed();

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function workout(Request $request)
    {

        $request->validate([
            'question_id' => 'required|int',
            'workout_id' => 'required|int'
        ]);


        $question = Question::findorfail($request->question_id);
        $workout = Workout::findorfail($request->workout_id);

        $result =  QuestionFactory::Build($question->questionType)
            ->workoutChecker($question, $workout, $request);

        return response()->json($result);
    }
}
