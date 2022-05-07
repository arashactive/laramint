<?php

namespace App\Utility\Modules\Tasks;


class TaskFactory
{

    private static function RemoveStringFromClassName($class)
    {
        return str_replace("App\Models\\", "", $class);
    }

    public static function Build($class)
    {
        $class = self::RemoveStringFromClassName($class);
        $classOfFileLoader = "App\\utility\\modules\\tasks\\adabpter\\" . $class . 'Adapter';
        return new $classOfFileLoader();

        throw new \Exception('The Question type is not found');
    }
}
