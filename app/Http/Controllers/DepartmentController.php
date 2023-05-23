<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Services\Back\Educations\DepartmentAdminService;

class DepartmentController extends Controller
{
    protected $service;
    private $viewPath = 'contents.admin.department';

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
        $this->service->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('department.create');
        return view($this->viewPath . ".form");
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
            $this->viewPath . ".form",
            compact(
                "department"
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DepartmentRequest  $request
     * @param  int  $department
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(DepartmentRequest $request, int $department)
    {
        $this->authorize('department.edit');
        $this->service->update($request->all(), $department);
        return redirect()
            ->route("department.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Department  $department
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Department $department)
    {
        $this->authorize('department.delete');
        try {
            $department->delete();
            return redirect()
                ->route("department.index")
                ->with('danger', __('item deleted successfully'));
        } catch (\Exception $e) {
            return redirect()
                ->route("department.index")
                ->with('danger', __('Delete is not Completed, Please check child of this department'));
        }
    }
}
