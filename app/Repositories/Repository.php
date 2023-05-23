<?php

namespace App\Repositories;

abstract class Repository
{

    protected $model;

    /**
     * The number of models to return for limits.
     *
     * @var int
     */
    protected $limitNumber = 5;



    /**
     * The number of models to return for limits.
     *
     * @var int
     */
    protected $perPage = 15;


    public function findById($id)
    {
        return $this->model::find($id);
    }

    /**
     * store default method for repository
     * @param array
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function store($request)
    {
        return  $this->model::create($request);
    }

    /**
     * store default method for repository
     * @param array
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function update($request, $id)
    {
        $record = $this->findById($id);
        return $record->update($request);
    }


    /**
     *  Limit Number of department return by default 5
     *
     * @param  int  $limitNumber
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function limit($limitNumber = 0)
    {

        if ($limitNumber > 0) {
            $this->limitNumber = $limitNumber;
        }

        return  $this->model::limit($this->limitNumber)->get();
    }

    /**
     *  Limit Number of department return by default 5
     *
     * @param  int  $perPage
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function paginate($perPage = 0)
    {

        if ($perPage > 0) {
            $this->perPage = $perPage;
        }

        return  $this->model::paginate($this->perPage);
    }
}
