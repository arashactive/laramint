<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        //return redirect(route('login'));
        return view('contents.front.index.welcome');
    }
}
