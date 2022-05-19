<?php


namespace App\Utility\Question\Traits;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Workout;
use App\Models\WorkoutQuizLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait WorkoutViewRender
{
    protected Question $question;
    protected Workout $workout;
    protected WorkoutQuizLog $workoutQuizQuestion;
    protected Quiz $quiz;

        
    /**
     * setQuizId
     *
     * @param  int|null $quiz_id
     * @return void
     */
    public function setQuizId(?int $quiz_id)
    {
        if ((int)$quiz_id > 0)
            $this->quiz = Quiz::findorfail($quiz_id);
    }

    
    /**
     * store
     *
     * @param  ?array $ids
     * @param  array $attributes
     * @return void|Question|bool
     */
    public function store(?array $ids, array $attributes)
    {
        
        if (!empty($this->quiz)) {
            $this->quiz->Questions()->create($attributes, ['order' => $this->quiz->Questions()->max('order') + 1]);
        } else {
            return Question::updateOrCreate($ids, $attributes);
        }
    }


    
    /**
     * workoutScoreUpdate
     *
     * @param  Workout $workout
     * @return int
     */
    public function workoutScoreUpdate(Workout $workout): int
    {
        $workoutQuiz = $workout->WorkOutQuiz;
        $sumOfScore = 0;
       
        $is_completed = true;
        $is_mentor = false;
        foreach ($workoutQuiz as $question) {
            if ($is_mentor == false && $question->is_mentor) {
                
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


    
    /**
     * workoutChecker
     *
     * @param  Question $question
     * @param  Workout $workout
     * @param  Request $request
     * @return int
     */
    public function workoutChecker(Question $question, Workout $workout, Request $request)
    {
        $workoutQuizQuestion = WorkoutQuizLog::where('workout_id', $workout->id)
            ->where('question_id', $question->id)->first();
       

        $this->question = $question;
        $this->workout = $workout;
        $this->workoutQuizQuestion = $workoutQuizQuestion;

        /** @phpstan-ignore-next-line */
        return $this->getScore($request);
    }


    
    /**
     * ReviewChecker
     *
     * @param  Question $question
     * @param  Workout $workout
     * @return string
     */
    public function ReviewChecker(Question $question, Workout $workout): string
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


    
    /**
     * createViewAsLearner
     *
     * @param  Question $question
     * @param  Workout $workout
     * @return string
     */
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
