<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;


class MultipleQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    
    private static $className = 'multiple-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className , 'create');
    }

   
}
