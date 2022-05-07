<?php

namespace App\Utility\File;

use App\Models\File;
use App\Utility\File\Enum\MemeEnum;

abstract class FileFactory
{


    public static function Build(File $file)
    {
        
        $className = MemeEnum::fileMemeToClassName($file->file_type);
        $classOfFileLoader = "App\\Utility\\File\\Adabpter\\" . $className;
        return new $classOfFileLoader($file);
    
        throw new \Exception('The Question type is not found');
    }
}
