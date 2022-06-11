<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('contents.general.profile.index', compact(
            'user'
        ));
    }
}
