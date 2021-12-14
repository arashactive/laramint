<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

route::post('/register' , [AuthenticationController::class , 'register'])->name('register');
route::post('/login' , [AuthenticationController::class , 'login'])->name("login");


Route::group(['middleware' => [
    'auth:sanctum', 'verified'
]], function () {

    Route::resource("/department" , DepartmentController::class);
    
});

