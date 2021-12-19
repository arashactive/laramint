<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Exception;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(env('PAGINATION'));
        return view("contents.admin.department.index", compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('contents.admin.department.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
       
        Department::create($request->all());
        return redirect()
            ->route("department.index")
            ->with('success' , __('item created successfully'));

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        
        return view('contents.admin.department.form' , compact(
            "department"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        
        $department->update($request->all());
        return redirect()
                ->route("department.index")
                ->with('warning' , __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        try{
            $department->delete();
            return redirect()
                    ->route("department.index")
                    ->with('danger' , __('item deleted successfully'));
        }catch (\Exception $e){
            return redirect()
            ->route("department.index")
            ->with('danger' , __('Delete is not Completed, Please check child of this department'));
        }
        
    }


}
