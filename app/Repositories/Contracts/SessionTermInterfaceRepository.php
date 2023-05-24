<?php

namespace App\Repositories\Contracts;

interface SessionTermInterfaceRepository
{
    /**
     * get next record
     * @param int id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function up($id);

    /**
     * get previous record
     * @param int id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function down($id);

    /**
     * update record
     * @param SessionTerm from
     * @param SessionTerm to
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function swap($from, $to);
}
