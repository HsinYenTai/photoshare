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



Route::any('user/logout', "UserController@logout");
Route::any('user/login', "UserController@getLogin");
Route::any('user/postLogin', "UserController@postLogin");
Route::any('user/login', "UserController@postLogin");

Route::any('user/register', "UserController@getRegister");
Route::any('user/postRegister', "UserController@postRegister");
Route::any('user/register', "UserController@postRegister");

Route::any('user/update', "UserController@update");
Route::any('admin/update', "UserController@adminUpdate");
Route::any('user/reset', "UserController@resetPassword");
Route::any('user/delete', "UserController@delete");

Route::any('user/me', "UserController@detail");
Route::any('user/admin', "UserController@view");

Route::any('album/create', 'AlbumController@create');
Route::any('album/delete', 'AlbumController@delete');

Route::any('item/save', 'ItemController@save');
Route::any('item/forward', 'ItemController@forward');
Route::any('item/like', 'ItemController@like');
Route::any('item/comment', 'CommentController@comment');

Route::any('activity/delete', 'ActivityController@delete');
Route::any('activity/save', 'ActivityController@save');
Route::any('activity/attendant', 'ActivityController@attendant');

Route::any('home/index', 'HomeController@index');
Route::any('home/dump', 'HomeController@dump');

Route::any('watch/watch', 'WatchController@watch');
Route::get('/', function () {
    return redirect("home/index");
});