<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('contents.general.settings.index', compact(
            'user'
        ));
    }


    public function update(Request $request, User $user)
    {
        $user->theme = $request->theme;
        $user->save();

        return redirect(route('settings'));
    }
}
