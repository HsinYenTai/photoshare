<?php

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

Route::any('user/login', "UserController@login");
Route::any('user/logout', "UserController@logout");
Route::any('user/register', "UserController@register");
Route::any('user/update', "UserController@update");
Route::any('user/reset', "UserController@resetPassword");
Route::any('user/delete', "UserController@delete");