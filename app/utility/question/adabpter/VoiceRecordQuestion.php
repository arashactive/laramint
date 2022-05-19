<?php

namespace App\Utility\Question\Adabpter;

use App\Utility\Question\Contract\QuestionAdabpterInterface;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;

class VoiceRecordQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    use UploadFiles;
    
    protected string $className = 'voice-record-question';
    protected bool $is_mentor = true;
    
    /**
     * getScore
     *
     * @param Request $request
     * @return int
     */
    public function getScore(Request $request)
    {
        $request->validate([
            'question_id' => 'required|int',
            'workout_id' => 'required|int',
            'answer_' . $this->question->id => 'required'
        ]);

        $file = $request->file("answer_" . $this->question->id);
        
        $score = 0;
        $file = $this->upload_file_by_student($file);

        $this->workoutQuizQuestion->update(
            [
                'answer' =>  json_encode($file),
                'score' => $score,
                'is_mentor' => $this->is_mentor
            ]
        );

        parent::workoutScoreUpdate($this->workout);
        return $score;
    }
}
