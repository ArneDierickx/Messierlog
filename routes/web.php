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
    return redirect("/personal");
});

Route::resource("/personal", "LogsController");

Route::resource('/public', "LogsController");

Route::get('/statistics', function () {
    return view('statistics');
});
