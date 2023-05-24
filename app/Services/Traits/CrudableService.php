<?php

namespace App\Services\Traits;


trait CrudableService
{
    /**
     * index method
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return $this->repository->paginate();
    }

    /**
     * store default method
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function store($request)
    {
        return $this->repository->store($request);
    }

  

    /**
     * store default method
     * @param array $request
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function update($request, $id)
    {
        return $this->repository->update($request, $id);
    }

    /**
     * store default method
     * @param int $id
     * @return bool
     */

    public function destroy($id)
    {
        try {
            $this->repository->destroy($id);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
