<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Front\HomeServices;

class FrontController extends Controller
{


    /**
     * Make HomePage Index
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(HomeServices $homeServices)
    {

        $homeCompactReturn = $homeServices->homeIndex();

        return view('contents.front.index.welcome', $homeCompactReturn);
    }

    
}
