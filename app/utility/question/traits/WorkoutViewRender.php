<?php


namespace App\utility\question\traits;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use Carbon\Carbon;

trait WorkoutViewRender
{
    protected $question;
    protected $workout;
    protected $workoutQuizQuestion;
    protected $quiz = null;
    
    
    public function setQuizId($quiz_id)
    {
        if ((int)$quiz_id > 0)
            $this->quiz = Quiz::findorfail($quiz_id);
        return $this;
    }

    


    public function store($id = [], $attributes)
    {
        if (!empty($this->quiz)) {
            $this->quiz->Questions()->create($attributes, ['order' => $this->quiz->Questions()->max('order') + 1]);
        } else {
            return Question::updateOrCreate($id, $attributes);
        }
    }



    public function workoutScoreUpdate(Workout $workout)
    {
        $workoutQuiz = $workout->WorkOutQuiz;
        $sumOfScore = 0;

        $is_completed = true;
        $is_mentor = false;
        foreach ($workoutQuiz as $question) {
            if(!$is_mentor && $question->is_mentor){
                $is_completed = false;
                $is_mentor = true;
            }
            $sumOfScore += (int)$question->score;
        }

        $score = (int)($sumOfScore /  count($workoutQuiz));

        $workout->update([
            'score' => $score,
            'is_completed' => $is_completed,
            'is_mentor' => $is_mentor,
            'date_get_score' => Carbon::now()->format("Y-m-d H:i:s")
        ]);

        return $score;
    }



    public function workoutChecker(Question $question, Workout $workout, $request)
    {
        $workoutQuizQuestion = WorkoutQuizLog::where('workout_id', $workout->id)
            ->where('question_id', $question->id)->first();

        $this->question = $question;
        $this->workout = $workout;
        $this->workoutQuizQuestion = $workoutQuizQuestion;

        $this->getScore($request);
    }



    public function ReviewChecker(Question $question, Workout $workout)
    {
        $answers = json_decode($question->answer, false);

        return view("livewire.factory.question." . $this->className . ".review", [
            'question' => $question,
            'answers' => $answers->answers,
            'correctAnswer' => $answers->correctAnswer,
            'workout' => $workout,
            'title' => $question->title,
            'question_body' => $question->question_body
        ])->render();
    }
    


    public function createViewAsLearner(Question $question, Workout $workout)
    {
        $answer = json_decode($question->answer, false);

        return view("livewire.factory.question." . $this->className . ".learner", [
            'question' => $question,
            'answer' => $answer,
            'workout' => $workout
        ])->render();
    }

}
