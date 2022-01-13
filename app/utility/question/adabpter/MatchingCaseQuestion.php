<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;


class MatchingCaseQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    
    private static $className = 'matching-case-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className , 'create');
    }

   
}
