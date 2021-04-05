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

Route::resource('category',App\Http\Controllers\CategoryController::class)->only(['index','store','show','update','destroy']);
Route::resource('product',App\Http\Controllers\ProductController::class)->only(['index','store','show','update','destroy']);
Route::any('product/{id}','App\Http\Controllers\ProductController@update');

Route::resource('employee',App\Http\Controllers\EmployeeController::class)->only(['index','store','show','update','destroy']);
Route::any('employee/{id}','App\Http\Controllers\EmployeeController@update');