<?php

namespace App\Services\Back;

use Illuminate\Database\Eloquent\Collection;

abstract class Services
{
    protected $repository;

    protected $view;

    /**
     * index method
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $departments = $this->repository->paginate();
        return view(
            $this->viewPath . ".index",
            compact('departments')
        );
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
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function edit($id)
    {
        return $this->repository->find($id);
    }

    protected function show()
    {
    }

    /**
     * store default method
     * @param array $request
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function update($request, $id)
    {
        $this->repository->update($request, $id);
    }


    protected function destroy()
    {
    }
}
