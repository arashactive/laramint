<?php

namespace App\Http\Controllers\Admin\Badges;

use App\Http\Controllers\Controller;
use App\Http\Requests\BadgeRequest;
use App\Models\Badge;


class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('badge.index');
        $badges = Badge::paginate();
        return view("contents.admin.badges.index", compact("badges"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $this->authorize('badges.create');
        return view('contents.admin.badges.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BadgeRequest  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(BadgeRequest $request)
    {
        $this->authorize('badges.create');
        Badge::create($request->all());
        return redirect()
            ->route("badges.index")
            ->with('success', __('item created successfully'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  Badge  $badge
     *      * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Badge $badge)
    {
        $this->authorize('badges.edit');
        return view('contents.admin.badges.form', compact(
            "badge"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  badgesRequest  $request
     * @param  badges  $badge
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(BadgeRequest $request, Badge $badge)
    {
        $this->authorize('badges.edit');
        $badge->update($request->all());
        return redirect()
            ->route("badges.index")
            ->with('warning', __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  badges  $badge
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Badge $badge)
    {
        $this->authorize('badges.delete');
        try {
            $badge->delete();
            return redirect()
                ->route("badges.index")
                ->with('danger', __('item deleted successfully'));
        } catch (\Exception $e) {
            return redirect()
                ->route("badges.index")
                ->with('danger', __('Delete is not Completed, Please check child of this badges'));
        }
    }
}
