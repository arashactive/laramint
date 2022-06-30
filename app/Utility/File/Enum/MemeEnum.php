<?php

namespace App\Utility\File\Enum;

Abstract class MemeEnum
{

    private static array $mime_types = array(

        'txt' => 'TextClass',

        // images
        'png' => 'ImageClass',
        'jpe' => 'ImageClass',
        'jpeg' => 'ImageClass',
        'jpg' => 'ImageClass',
        'gif' => 'ImageClass',

        // audio
        'mp3' => 'AudioClass',
        'qt' => 'AudioClass',
        'mov' => 'AudioClass',

        // video
        'mp4' => 'VideoClass',

        // adobe
        'pdf' => 'PdfClass',
    );

    public static function fileMemeToClassName(string $type): string
    {
        if(!isset(self::$mime_types[strtolower($type)]))
            return 'FileDownloadClass';
        
        return self::$mime_types[strtolower($type)];    
    }
}
