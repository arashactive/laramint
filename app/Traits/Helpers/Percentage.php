<?php


namespace App\Traits\Helpers;


trait Percentage
{

    /**
     * calculatePercentageBetweenTwoNumber
     *
     * @param  int $total
     * @param  int $item
     * @return int
     */
    private static function calculatePercentageBetweenTwoNumber(int $total, int $item): int
    {

        if (($item != 0) && ($total != 0)) {
            $percentChange = 100 - ((1 - $item / $total) * 100);
        } else {
            $percentChange = 0;
        }
        return (int)$percentChange;
    }
}
