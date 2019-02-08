<?php

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

Route::post('login', 'API\Auth\AuthController@login');
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'API\Auth\AuthController@logout');
    Route::get('user', 'API\Auth\AuthController@user');
});
