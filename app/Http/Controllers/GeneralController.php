<?php

namespace App\Http\Controllers;

use App\Services\Units\Coins\UserCoins;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function dashboard(UserCoins $userCoins)
    {
        $user = Auth::user();
        $user->badge = $userCoins->getUserBadge($user);

        return view('contents.dashboard.index', compact('user'));
    }
}
