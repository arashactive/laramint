<?php

namespace App\Services\Back;

abstract class Services
{
    // make instance of repository for child class
    protected $repository;

    // make protected variable for view path
    protected $path;

    // make protected variable for redirect route name
    protected $route;

    protected $messageValue = [
        'success' => 'item created successfully',
        'danger' => 'item deleted',
        'warning' => 'item updated successfully'
    ];

    /**
     * store default method
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    /**
     * Display a listing of the resource.
     * @param string $file  
     * @param array $arraySendToView  
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function view(string $file, $arraySendToView = [])
    {
        return view($this->path . '.' . $file, $arraySendToView);
    }

    /**
     * Display a listing of the resource.
     * @param string $messageType
     * @param string $routeName  
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect($messageType = 'success', $routeName = '')
    {
        return redirect()
            ->route($routeName != '' ? $routeName : $this->route . '.index')
            ->with($messageType, __($this->messageValue[$messageType]));
    }

    /**
     * Redirect To previus url
     * @param string $messageType
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirectBack($messageType = 'success')
    {
        return redirect()
            ->back()
            ->with($messageType, __($this->messageValue[$messageType]));
    }
}
