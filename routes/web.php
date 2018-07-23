<?php
/* OtsukaisController */
// otsukai
Route::get('/', 'OtsukaisController@index')->name('otsukais.index');
Route::get('otsukais/create/', 'OtsukaisController@create_otsukai')->name('otsukais.create');
Route::post('otsukais/create/confirm', 'OtsukaisController@confirm_create_otsukai')->name('otsukais.confirm_create_otsukai');
Route::post('otsukais/', 'OtsukaisController@store_otsukai')->name('otsukais.store');
Route::get('otsukais/{id}/', 'OtsukaisController@show_otsukai')->name('otsukais.show');
Route::get('otsukais/{id}/edit/', 'OtsukaisController@edit_otsukai')->name('otsukais.edit');
Route::put('/otsukais/{id}/', 'OtsukaisController@update_otsukai')->name('otsukais.update');
Route::get('otsukais/{id}/complete', 'OtsukaisController@complete')->name('otsukais.complete');
Route::delete('otsukais/{id}/delete', 'OtsukaisController@destroy_otsukai')->name('otsukais.destroy');

// request
Route::get('otsukais/{id}/request/create/', 'OtsukaisController@create_request')->name('requests.create');
Route::post('otsukais/request/{id}/confirm/', 'OtsukaisController@confirm_create_request')->name('requests.confirm_create_request');
Route::post('otsukais/request/{id}/', 'OtsukaisController@store_request')->name('requests.store');
Route::get('otsukais/request/{id}/', 'OtsukaisController@show_request')->name('requests.show');
Route::get('otsukais/request/{id}/edit/', 'OtsukaisController@edit_request')->name('requests.edit');
Route::post('otsukais/request/{id}/edit/confirm/', 'OtsukaisController@confirm_edit_request')->name('requests.confirm_edit_request');
Route::put('otsukais/request/{id}/', 'OtsukaisController@update_request')->name('requests.update');
Route::get('otsukais/request/{id}/pay/','OtsukaisController@pay')->name('requests.pay');
Route::delete('otsukais/request/{id}/delete', 'OtsukaisController@destroy_request')->name('requests.destroy');

/* ItemsController */
Route::resource('items', 'ItemsController');

/* ShopsController */
Route::resource('shops', 'ShopsController');

/* UsersController */
Route::get('user/{id}', 'UsersController@show')->name('users.show');

/* Authentication */
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => 'auth'], function () {
    /* OtsukaisController */
    // otsukai
    Route::get('otsukais/create/', 'OtsukaisController@create_otsukai')->name('otsukais.create');
    Route::post('otsukais/', 'OtsukaisController@store_otsukai')->name('otsukais.store');
    Route::get('otsukais/{id}/', 'OtsukaisController@show_otsukai')->name('otsukais.show');
    Route::get('otsukais/{id}/edit/', 'OtsukaisController@edit_otsukai')->name('otsukais.edit');
    Route::put('/otsukais/{id}/', 'OtsukaisController@update_otsukai')->name('otsukais.update');
    Route::delete('otsukais/{id}/delete', 'OtsukaisController@destroy_otsukai')->name('otsukais.destroy');
    
    // request
    Route::get('otsukais/{id}/request/create/', 'OtsukaisController@create_request')->name('requests.create');
    Route::post('otsukais/request/{id}/', 'OtsukaisController@store_request')->name('requests.store');
    Route::get('otsukais/request/{id}/', 'OtsukaisController@show_request')->name('requests.show');
    Route::get('otsukais/request/{id}/edit/', 'OtsukaisController@edit_request')->name('requests.edit');
    Route::post('otsukais/request/{id}/edit/confirm/', 'OtsukaisController@confirm_edit_request')->name('requests.confirm_edit_request');
    Route::post('otsukais/request/{id}/confirm/', 'OtsukaisController@confirm_create_request')->name('requests.confirm_create_request');
    Route::put('otsukais/request/{id}/', 'OtsukaisController@update_request')->name('requests.update');
    Route::get('otsukais/request/{id}/pay/','OtsukaisController@pay')->name('requests.pay');
    Route::delete('otsukais/request/{id}/delete', 'OtsukaisController@destroy_request')->name('requests.destroy');
    
    /* ItemsController */
    Route::resource('items', 'ItemsController');

    /* ShopsController */
    Route::resource('shops', 'ShopsController');
    
    /* UsersController */
    Route::get('user/{id}', 'UsersController@show')->name('users.show');

    // LINE Notify
    Route::get('{id}/notify', 'LineNotifyController@notify')->name('line.notify');
});

/* LINE Notify */
Route::get('{id}/notify', 'LineNotifyController@notify')->name('line.notify');