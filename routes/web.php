<?php

use Illuminate\Support\Facades\Route;

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


Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');


/*Route::get('/', function () {
    return view('welcome');
});


Route::get('/category', function () {
    return view('app');
});

Route::get('/product', function () {
    return view('app');
});

Route::get('{any}', function () {
    return view('app');
})->where('any','');


Route::get(['category','product'], function () {
    return view('app');
});
Route::get('category/{any}', function () {
    return view('app');
});//->where('any','.*');

Route::get('product/{any}', function () {
    return view('app');
});//->where('any','*');





Route::get('/', function () {
    return view('welcome');
});

Route::get('/404', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('welcome');
})->middleware(EnsureTokenIsValid::class);;*/