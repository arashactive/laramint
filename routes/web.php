<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Department;
use App\Http\Livewire\Pages\Contents\Courses\Course;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => [
    'auth:sanctum', 'verified'
]], function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/department', Department::class)->name('department');
    Route::get('/courses', Course::class)->name('course');
});
