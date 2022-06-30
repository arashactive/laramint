<?php


namespace App\Utility\Question\Traits;


trait CreateUpdateForm
{    
    /**
     * getCreateUpdateForm
     *
     * @return string
     */
    public function getCreateUpdateForm()
    {
        return $this->render($this->className, 'create');
    }
    
    /**
     * render
     *
     * @param  string $questionType
     * @param  string $file
     * @return string
     */
    public function render($questionType, $file)
    {
        return "factory.question.{$questionType}.{$file}";
    }

}
