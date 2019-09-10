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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', 'TaskController@index');
    Route::post('/', 'TaskController@store');
    Route::get('/{id}', 'TaskController@show');
    Route::put('/{id}', 'TaskController@update');
    Route::delete('/{id}', 'TaskController@destroy');
});

Route::group(['prefix' => 'taskUser'], function () {
    Route::get('/', 'TaskUserController@index');
    Route::post('/', 'TaskUserController@store');
    Route::get('/{id}', 'TaskUserController@show');
    Route::put('/{id}', 'TaskUserController@update');
    Route::delete('/{id}', 'TaskUserController@destroy');
});
