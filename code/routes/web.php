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

Route::get('user/login', "UserController@getLogin");
Route::get('user/postLogin', "UserController@postLogin");
Route::post('user/login', "UserController@postLogin");


Route::get('user/register', "UserController@getRegister");
Route::get('user/postRegister', "UserController@postRegister");
Route::post('user/register', "UserController@postRegister");


Route::any('user/update', "UserController@update");
Route::any('user/reset', "UserController@resetPassword");
Route::any('user/delete', "UserController@delete");