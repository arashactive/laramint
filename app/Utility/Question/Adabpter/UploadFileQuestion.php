<?php

namespace App\Utility\Question\Adabpter;

use App\Utility\Question\Contract\QuestionAdabpterInterface;
use App\Traits\UploadFiles;



class UploadFileQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    use UploadFiles;
    protected string $className = 'upload-file-question';
    protected bool $is_mentor = true;

    public function getScore($request)
    {
        
        $file = $request->file("answer-" . $this->question->id);
        
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
