<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;


class UploadFileQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    
    private static $className = 'upload-file-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className , 'create');
    }
    public static function createViewAsLearner(){
        
    }
   
}
