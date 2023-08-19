<?php

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


// Show login and registration forms
Route::get('login', 'AuthController@showLoginForm')->name('login');
Route::get('register', 'AuthController@showRegistrationForm')->name('register');


// Process login and registration forms
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');


// Logout
Route::post('logout', 'AuthController@logout')->name('logout');
