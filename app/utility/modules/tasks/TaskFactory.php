<?php

namespace App\utility\modules\tasks;


class TaskFactory
{

    private static function RemoveStringFromClassName($class)
    {
        return str_replace("App\Models\\", "", $class);
    }

    public static function Build($class)
    {
        $class = self::RemoveStringFromClassName($class);
        $classOfFileLoader = "App\\Utility\\Modules\\Tasks\\Adabpter\\" . $class . 'Adapter';
        return new $classOfFileLoader();

        throw new \Exception('The Question type is not found');
    }
}
