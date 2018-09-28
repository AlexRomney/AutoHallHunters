<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->group(function() {
    Route::group(['middleware' => ['admin']], function() {
        Route::get('appointments', 'AdminController@allAppointments');
    });
});
