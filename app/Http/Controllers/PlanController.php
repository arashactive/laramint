<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Plan;

class PlanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('plan.index');
        $plans = Plan::paginate();
        return view("contents.admin.plan.index", compact("plans"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('plan.create');
        return view('contents.admin.plan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlanRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(PlanRequest $request)
    {
        $this->authorize('plan.create');
        Plan::create($request->all());
        return redirect()
            ->route("plan.index")
            ->with('success', __('item created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Plan  $plan
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Plan $plan)
    {
        $this->authorize('plan.edit');
        return view('contents.admin.plan.form', compact(
            "plan"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlanRequest  $request
     * @param  Plan  $plan
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(PlanRequest $request, Plan $plan)
    {
        $this->authorize('plan.edit');
        $plan->update($request->all());
        return redirect()
            ->route("plan.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Plan $plan
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Plan $plan)
    {
        $this->authorize('plan.delete');
        $plan->delete();
        return redirect()
            ->route("plan.index")
            ->with('danger', __('item deleted successfully'));
    }
}
