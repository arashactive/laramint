<?php

namespace App\Http\Controllers\learn;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Session;
use App\Models\Sessionable;
use App\Models\Term;
use App\Models\Workout;
use App\utility\question\WorkoutBuilderFactory;
use App\utility\workout\WorkoutService;

use Illuminate\Http\Request;

class quizLearnerController extends Controller
{

    public function show(Term $term, Quiz $activity, Session $session, Sessionable $sessionable)
    {

        $this->authorize('QuizViewForLearner', [$activity, $term]);

        // set a record for workout table
        $workout = WorkoutService::WorkOutSyncForThisExcersice($term, $session, $activity->id, $sessionable->id);
        WorkoutService::setWorkOutQuizSyncForThisExcersice($workout, $activity);
        
        return view('contents.learn.quiz.show', compact([
            'term', 'activity', 'workout'
        ]));
    }


    public function workout(Request $request)
    {
        $question = Question::findorfail($request->question_id);
        $workout = Workout::findorfail($request->workout_id);

        return WorkoutBuilderFactory::Builder($question, $workout, $request);
    }
}
