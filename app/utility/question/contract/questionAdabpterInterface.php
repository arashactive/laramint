<?php

namespace App\Utility\Question\Contract;

use Illuminate\Http\Request;

interface QuestionAdabpterInterface
{    
    /**
     * getScore
     *
     * @param  Request $request
     * @return int|null
     */
    public function getScore(Request $request);
}
