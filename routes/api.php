<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['auth:api']], function () {

    Route::get('user', 'UsersController@myInfo')->name('user');
    Route::get('users', 'UsersController@index')->name('users');
    Route::post('users/store', 'UsersController@store')->name('users-sotre');
    Route::get('users/{user}', 'UsersController@show')->name('user-info');
    Route::patch('users/{user}', 'UsersController@update')->name('user-update');
    Route::delete('users/{user}', 'UsersController@destroy')->name('user-delete');
});

