<?php

namespace App\utility\question\adabpter;

use App\traits\UploadFiles;
use App\utility\question\contract\QuestionAdabpterInterface;


class UploadFileQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    use UploadFiles;
    protected $className = 'upload-file-question';
    protected $is_mentor = true;

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
