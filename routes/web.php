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

/*Route::get('/', function () {
    
    return view('index', compact('title'));
});*/
Route::get('/', 'Controller@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/update', 'DashboardController@update');