<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;

class FrontController extends Controller
{

    
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(){
        
        $departments = Department::limit(3)->get();
        $courses = Course::with('Department', 'Terms')->get();
        
        return view('contents.front.index.welcome', compact('departments', 'courses'));
    }
}
