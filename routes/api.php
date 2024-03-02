<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('index', 'App\Http\Controllers\TestController@index');
    Route::get('show/{post}', 'App\Http\Controllers\TestController@show');
    Route::post('store', 'App\Http\Controllers\TestController@store');
    Route::patch('update', 'App\Http\Controllers\TestController@update');
    Route::delete('destroy', 'App\Http\Controllers\TestController@destroy');
});
