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
    return view('main', ['user' => Auth::user() ? Auth::user() : false]);
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('task/new', '\App\Http\Controllers\TaskController@create');
Route::post('task/new', '\App\Http\Controllers\TaskController@store');

Auth::routes();
