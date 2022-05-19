<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $roles = Role::paginate();
        return view("contents.admin.acl.role.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {

        return view('contents.admin.acl.role.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleRequest  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {

        $role = Role::create($request->all());
        return redirect()
            ->route("role.index")
            ->with('success', __('item created successfully'));
    }


    /**
     * Display the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Role $role)
    {
        $permissions = Permission::all();
        $role_permission = $role->Permissions->pluck("id")->toArray();

        return view('contents.admin.acl.role.show', compact(
            "role",
            "permissions",
            "role_permission"
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Role $role)
    {
        return view('contents.admin.acl.role.form', compact(
            "role"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RoleRequest  $request
     * @param  Role  $role
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {

        $role->update($request->all());
        return redirect()
            ->route("role.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()
                ->route("role.index")
                ->with('danger', __('item deleted successfully'));
        } catch (\Exception $e) {
            return redirect()
                ->route("role.index")
                ->with('danger', __('Delete is not Completed, Please check child of this user'));
        }
    }

    /**
     * sync permissions to the specified role.
     *
     * @param  Request  $request
     * @param  Role  $role
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function permission(Request $request, Role $role)
    {

        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Role Permissions is updated');
    }
}
