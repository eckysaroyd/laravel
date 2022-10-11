<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


//Admin login route without admin group
// Route::get('admin/login','App\Http\Controllers\Admin\AdminController@login');

// Admin dashboard route without admin group
// Route::get('admin/dashboard','App\Http\Controllers\Admin\AdminController@dashboard');

// Admin route grouped
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
   //Admin login route
    Route::match(['get','post'],'login','AdminController@login');
    //route group for middleware --all routes inside middleware are protected routes
    Route::group(['middleware'=>['admin']],function () {
         // Admin dashboard route
        Route::get('dashboard','AdminController@dashboard');

        // Admin logout
        Route::get('logout','AdminController@logout');

    });
});
