<?php

namespace App\utility\question\adabpter;

use App\utility\question\contract\QuestionAdabpterInterface;

class TestQuestion extends QuestionParent implements QuestionAdabpterInterface
{
    
    private static $className = 'test-question';

    public static function getCreateUpdateForm()
    {
        return parent::render(self::$className , 'create');
    }
}
