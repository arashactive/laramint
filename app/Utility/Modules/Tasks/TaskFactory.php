<?php

namespace App\Utility\Modules\Tasks;


class TaskFactory
{
    
    /**
     * RemoveStringFromClassName
     *
     * @param  string $class
     * @return string
     */
    private static function RemoveStringFromClassName($class)
    {
        return str_replace("App\Models\\", "", $class);
    }

    
    /** @return object */
    public static function Build(string $class)
    {
        $class = self::RemoveStringFromClassName($class);
        $classOfFileLoader = "App\\Utility\\Modules\\Tasks\\Adabpter\\" . $class . 'Adapter';
        return new $classOfFileLoader();

        /** @phpstan-ignore-next-line */
        throw new \Exception('The Question type is not found');
    }
}
