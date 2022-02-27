<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;


class EssayQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    
    private static $className = 'essay-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className , 'create');
    }

    public static function createViewAsLearner(){
        
    }

   
}
