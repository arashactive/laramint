<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Services\Back\Educations\DepartmentAdminService;

class DepartmentController extends Controller
{
    protected $service;
    private $path = 'contents.admin.department';

    public function __construct(DepartmentAdminService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('department.index');
        $departments = $this->service->index();
        return view($this->path . '.index', [
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('department.create');
        return view($this->path . ".form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DepartmentRequest  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        $this->authorize('department.create');
        $this->service->store($request->all());
        return redirect()
            ->route("department.index")
            ->with('success', __('item created successfully'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $department
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($department)
    {
        $this->authorize('department.edit');
        $department = $this->service->edit($department);
        return view(
            $this->path . ".form",
            [
                'department' => $department
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DepartmentRequest  $request
     * @param  int  $department_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(DepartmentRequest $request, int $department_id)
    {
        $this->authorize('department.edit');
        $this->service->update($request->all(), $department_id);
        return redirect()
            ->route("department.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $department_id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(int $department_id)
    {
        $this->authorize('department.delete');
        if ($this->service->destroy($department_id))
            return redirect()
                ->route("department.index")
                ->with('danger', __('item deleted successfully'));
    }
}
