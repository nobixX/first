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

Route::get('/', function () {
    return view('create');
});

Route::resource('games', 'GameController');

Route::get('/hello', function () {
    return 'create';
});

Route::get('/shankar', function () {
    return 'shankarr';
});

Route::get('/today', function () {
    return 'firstsleeplessnight';
});

Route::get('/finally', function () {
    return 'go to sleep';
});

Route::get('/fi', function () {
    return 'go to sleep';
});


