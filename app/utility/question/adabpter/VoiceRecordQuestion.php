<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;


class VoiceRecordQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    
    private static $className = 'voirce-record-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className , 'create');
    }

   
}
