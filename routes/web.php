<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'AppointmentController@index')->name('home');
Route::get('/create-appointment', 'AppointmentController@createAppointment');
Route::post('/create-appointment', 'AppointmentController@store');
Route::get('/appointment/{id}/edit', 'AppointmentController@edit');
Route::post('/appointment/{id}', 'AppointmentController@update');
Route::post('/appointment/delete/{id}', 'AppointmentController@destroy');

Route::prefix('/admin')->group(function() {
    Route::group(['middleware' => ['admin']], function() {
        Route::get('/appointments', 'AdminController@allAppointments');
        Route::get('/appointment/{id}/edit', 'AdminController@edit');
        Route::post('/appointment/{id}', 'AdminController@update');
        Route::post('/appointment/delete/{id}', 'AdminController@destroy');
    });
});
