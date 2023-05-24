<?php

namespace App\Repositories\Models;

use App\Models\SessionTerm;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\SessionTermInterfaceRepository;

class SessionTermRepository extends BaseRepository implements SessionTermInterfaceRepository
{

    protected $model;

    public function __construct(SessionTerm $sessionTerm)
    {
        $this->model = $sessionTerm;
    }

    /**
     * get up record
     * @param SessionTerm $from
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function up($from)
    {
        return $this->model->where('term_id', $from->term_id)
            ->where('order', '<', $from->order)
            ->orderBy('order', 'desc')
            ->first();
    }

    /**
     * get down record
     * @param SessionTerm $from
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function down($from)
    {
        return $this->model->where('term_id', $from->term_id)
            ->where('order', '>', $from->order)
            ->orderBy('order', 'asc')
            ->first();
    }


    /**
     * update record
     * @param SessionTerm from
     * @param SessionTerm to
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function swap($from, $to)
    {
        $toOrder = $to->order;
        $to->order = $from->order;
        $from->order = $toOrder;
        $to->save();
        $from->save();
        return true;
    }
}
