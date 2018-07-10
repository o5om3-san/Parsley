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

Route::get('otsukais/request/{id}','OtsukaisController@request');
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::resource('otsukais', 'OtsukaisController');


// ItemsController

// ShopsController

// UsersController


// Authentication
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');