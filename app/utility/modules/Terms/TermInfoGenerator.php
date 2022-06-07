<?php

namespace App\Utility\Modules\Terms;

use App\Models\Term;

class TermInfoGenerator
{
    protected Term $term;

    public function __construct(Term $term)
    {
        $this->term = $term;
        return $this->term;
    }

    public function getTermStatistic()
    {
         
    }
}
