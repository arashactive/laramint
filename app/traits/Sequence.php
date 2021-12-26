<?php


namespace App\traits;

trait Sequence
{

    /**
     * change the order of row order field
     *
     */
    public function changeOrder($from, $to)
    {
        if ($from && $to) {
            $fromOrder =  $from->order;
            $from->order = $to->order;
            $to->order = $fromOrder;

            $from->save();
            $to->save();
            return true;
        } else {
            return false;
        }
    }
}
