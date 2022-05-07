<?php


namespace App\Traits\Helpers;


trait Percentage
{

    private static function calculatePercentageBetweenTwoNumber($total, $item)
    {
        
        if (($item != 0) && ($total != 0)) {
            $percentChange = 100 - ((1 - $item / $total) * 100);
        }
        else {
            $percentChange = 0;
        }
        return $percentChange;
    }

    

}