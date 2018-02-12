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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->namespace('Api\v1')->group(function (){
    Route::get('/blogs','BlogController@index');
    Route::get('/blogs/{blog}','BlogController@show');
    Route::post('/blogs','BlogController@store');
    Route::post('Login','UserController@login');
    Route::post('Register','UserController@register');
});