<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('ussd', 'BalanceController@session');
Route::post('databalance', 'BalanceController@getBalance');
Route::get('index', 'BalanceController@apiIndex');
Route::post('unique', 'BalanceController@unique');
Route::post('create', 'BalanceController@apiCreate');
Route::post('delete', 'BalanceController@destroy');
