<?php


namespace App\Traits;

trait Sequence
{

    /** @phpstan-ignore-next-line */
    public function changeOrder($from, $to): bool
    {

        $fromOrder =  $from->order;
        $from->order = $to->order;
        $to->order = $fromOrder;

        $from->save();
        $to->save();


        return true;
    }
}
