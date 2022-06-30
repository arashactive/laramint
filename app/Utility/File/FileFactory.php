<?php

namespace App\Utility\File;

use App\Models\File;
use App\Utility\File\Enum\MemeEnum;

abstract class FileFactory
{

    /** @return object */
    public static function Build(File $file)
    {

        $className = MemeEnum::fileMemeToClassName($file->file_type);
        $classOfFileLoader = "App\\Utility\\File\\Adabpter\\" . $className;
        return new $classOfFileLoader($file);

        /** @phpstan-ignore-next-line */
        throw new \Exception('The Question type is not found');
    }
}
