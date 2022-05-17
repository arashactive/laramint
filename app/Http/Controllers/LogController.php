<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $this->authorize('log.index');
        $theme = [
            'created' => 'success',
            'updated' => 'warning',
            'deleted' => 'danger'
        ];
        $logs = Activity::paginate();
        return view("contents.general.log.index", compact("logs", "theme"));
    }
}
