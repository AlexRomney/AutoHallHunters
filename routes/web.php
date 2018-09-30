<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'AppointmentController@index')->name('home');
Route::get('/create-appointment', 'AppointmentController@createAppointment');
Route::post('/create-appointment', 'AppointmentController@store');
Route::get('/appointment/{id}/edit', 'AppointmentController@show');
Route::post('/appointment/{id}', 'AppointmentController@update');

Route::prefix('/admin')->group(function() {
    Route::group(['middleware' => ['admin']], function() {
        Route::get('appointments', 'AdminController@allAppointments');
    });
});
