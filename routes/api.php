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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks','TasksController@index');
Route::post('/tasks','TasksController@store');
Route::get('/tasks/{id}','TasksController@tasks');
Route::put('/tasks/{id}','TasksController@edit');
Route::delete('/tasks/{id}','TasksController@delete');
Route::put('/tasks/{id}/close','TasksController@close');
