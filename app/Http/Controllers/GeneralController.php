<?php

namespace App\Http\Controllers;

use App\Services\Coins\UserCoins;
<<<<<<< HEAD
=======
use App\Utility\Modules\Terms\ParticipantInfoGenerator;
>>>>>>> e83029b2e2e9ec0f1c7b5bdabf6236d3c9e48ca2
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
<<<<<<< HEAD

        return view('contents.dashboard.index', compact('user'));
=======
        
        $lastTerm = ParticipantInfoGenerator::getLastTermForParticipant($user);
        
        return view('contents.dashboard.index', compact('user', 'lastTerm'));
>>>>>>> e83029b2e2e9ec0f1c7b5bdabf6236d3c9e48ca2
    }
}
