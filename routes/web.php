<?php
/* OtsukaisController */
// otsukai
Route::get('/', 'OtsukaisController@index')->name('otsukais.index');
Route::get('otsukais/create/', 'OtsukaisController@create_otsukai')->name('otsukais.create');
Route::post('otsukais/', 'OtsukaisController@store_otsukai')->name('otsukais.store');
Route::get('otsukais/{otsukai}/', 'OtsukaisController@show_otsukai')->name('otsukais.show');
Route::get('otsukais/{otsukai}/edit/', 'OtsukaisController@edit_otsukai')->name('otsukais.edit');
Route::put('/otsukais/otsukai/', 'OtsukaisController@update_otsukai')->name('otsukais.update');
Route::delete('otsukais/{otsukai}/', 'OtsukaisController@store_otsukai')->name('otsukais.destroy');

// request
Route::get('otsukais/{id}/request/create/', 'OtsukaisController@create_request')->name('requests.create');
Route::post('otsukais/request/{id}/', 'OtsukaisController@store_request')->name('requests.store');
Route::get('otsukais/request/{request}/', 'OtsukaisController@show_request')->name('requests.show');
Route::get('otsukais/request/{request}/edit/', 'OtsukaisController@edit_request')->name('requests.edit');
Route::put('otsukais/request/{request}/', 'OtsukaisController@update_request')->name('requests.update');
Route::delete('otsukais/request/{request}', 'OtsukaisController@store_request')->name('requests.destroy');

/* ItemsController */

/* ShopsController */

/* UsersController */

/* Authentication */
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => 'auth'], function () {
    
});