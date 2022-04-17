<?php


namespace App\utility\question\traits;


trait CreateUpdateForm
{
    public function getCreateUpdateForm()
    {
        return $this->render($this->className, 'create');
    }

    public function render($questionType, $file)
    {
        return "factory.question.{$questionType}.{$file}";
    }

}
