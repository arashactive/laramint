<?php

namespace App\utility\file;

use App\Models\File;
use App\utility\file\enum\MemeEnum;

abstract class FileFactory
{


    public static function Build(File $file)
    {
        
        $className = MemeEnum::fileMemeToClassName($file->file_type);
        $classOfFileLoader = "App\\utility\\file\\adabpter\\" . $className;
        return new $classOfFileLoader($file);
    
        throw new \Exception('The Question type is not found');
    }
}
