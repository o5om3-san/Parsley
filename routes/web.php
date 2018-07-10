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

// OtsukaisController
Route::get('/', 'OtsukaisController@index');

Route::resource('otsukais', 'OtsukaisController');

Route::get('/request/{id}', 'OtsukaisController@request')->name('otsukais.request');
// ItemsController

// ShopsController

// UsersController

// OtsukaiGiantController
Route::post('request/{id}', 'OtsukaiGiantController@request')->name('otsukai_giant.request');


// Authentication
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('otsukais', 'OtsukaisController');
    Route::resource('user', 'UsersController');
 });