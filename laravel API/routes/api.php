<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers') ->group(function(){

    // GET API - Fetch one or more records
        Route::get('users/{id?}','APIController@getUsers');

    //secure GET API - Fetch one or more records
        Route::get('usersList','APIController@getUsersList');


    // POST API - Add single user
        Route::post('addUsers','APIController@addUsers');

    // POST API - Add Multiple users
        Route::post('addMultipleUsers','APIController@addMultipleUsers');
    //PUT API - Update one or more records
        Route::put('update-user-details/{id}','APIController@updateUserDetails');

    //PATCH API - Update one  records
        Route::patch('update-user-name/{id}','APIController@updateUserName');

    //delete single user with Param
        Route::delete('deleteUsers/{id}','APIController@delete_users');
    //delete single user with JSON
    Route::delete('deleteUsers/{id}','APIController@delete_users_with_json');
    //Delete multiple Users
    Route::delete('deleteMultipleUsers/{ids}','APIController@deleteMultiple');
    // delete Multiple Users with Json
    Route::delete("deleteMultipleUsersJson",'APIController@deleteMultipleUsersJson');


});

