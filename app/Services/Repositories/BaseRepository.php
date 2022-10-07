<?php

namespace App\Services\Repositories;

use App\Services\Contracts\BaseInterfaceRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterfaceRepository
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function model()
    {
        return $this->model;
    }

    public function getAll()
    {
        return $this->model::all();
    }

    public function getById($id)
    {
        return $this->model::find($id);
    }

    public function save($data)
    {
        return $this->model::create($data);
    }

    public function update($id, $data)
    {
        $model = $this->model::find($id);
        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        try {
            $model = $this->model::where('id', $id)->delete();
            return $model;
        } catch (\Exception $e) {
            return false;
        }
    }
}
