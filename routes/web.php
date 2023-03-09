<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['namespace' => 'App\Http\Controllers'],function (){
    Route::get('/', 'HomeController@index')->name('home');


    Route::group(['middleware'=>['guest']],function (){
        //register route
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.registration');
        Route::get('/login','LoginController@show')->name('login.show');
        Route::post('/login','LoginController@login')->name('login.loginUser');

    });

    Route::group(['middleware'=>['auth']],function (){
        //logout
        Route::get('/logout','LogoutController@logout')->name('logout');
        Route::resource('/branch', BranchController::class);
        Route::resource('/employee',EmployeeController::class);


    });
});

