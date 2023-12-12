<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::match(['get','post'],'login', 'AdminController@login');
    Route::group(['middleware'=> 'admin'], function () {
        // Route::get('/', 'AdminController@dashboard');
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('categories', 'CategoryController@categories');
        Route::get('category', 'CategoryController@category');
        Route::get('logout', 'AdminController@logout');
    });
});
