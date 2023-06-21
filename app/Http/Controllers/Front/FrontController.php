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
//        return view('welcome', $homeCompactReturn);
    }

    /**
     * Make About Us Page
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function about()
    {
        return view('contents.front.index.about');
    }

    /**
     * Make Contact Us
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function gallery()
    {
        return view('contents.front.index.gallery');
    }

    /**
     * Make Contact Us
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function contact()
    {
        return view('contents.front.index.contact');
    }
    
    /**
     * Make News
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function news()
    {
        return view('contents.front.index.news');
    }

    
}
