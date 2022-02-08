<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function courses(){
        return view('front.index.welcome');
    }
}
