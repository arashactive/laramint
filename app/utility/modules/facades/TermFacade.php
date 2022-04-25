<?php

namespace App\utility\modules\facades;

use App\utility\modules\terms\TermModule;

abstract class TermFacade{

    public static function Build()
    {
        return new TermModule();
    }

}