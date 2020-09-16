<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'UserController@index')->middleware('isAccepted');
Route::get('/accept', 'UserController@indexAccept')->name('auth');
Route::post('/accept', 'UserController@accept')->name('auth');
Route::get('/services', 'ServiceController@indexServices')->middleware('isAccepted');
Route::get('/service/add', 'ServiceController@indexAddService')->middleware('isAdmin');
Route::post('/service/add', 'ServiceController@addService')->middleware('isAdmin');
Route::get('/service/edit/{id}', 'ServiceController@indexEditService')->middleware('isAdmin');
Route::post('/service/edit/{id}', 'ServiceController@editService')->middleware('isAdmin');
Route::get('/service/{id}', 'ServiceController@singleService')->middleware('isAccepted');
Route::get('/history', 'PaymentController@indexHistory')->middleware('isAccepted');
Route::get('/balance/add', 'PaymentController@indexAddBalance')->middleware('isAccepted');
Route::post('/balance/add', 'PaymentController@addBalance')->middleware('isAccepted');
Route::post('/service/buy', 'PaymentController@buyService')->middleware('isAccepted');
Route::get('/services/active', 'ServiceController@indexActive')->middleware('isAccepted');
Route::get('/order/{id}', 'ServiceController@singleActive')->middleware('isAccepted');
Route::get('/tasks', 'TaskController@indexTasks')->middleware('isAdmin');
Route::get('/task/add', 'TaskController@indexAddTask')->middleware('isAdmin');
Route::post('/task/add', 'TaskController@addTask')->middleware('isAdmin');
Route::get('/task/edit/{id}', 'TaskController@indexEditTask')->middleware('isAdmin');
Route::post('/task/edit/{id}', 'TaskController@editTask')->middleware('isAdmin');
Route::get('/task/delete/{id}', 'TaskController@deleteTask')->middleware('isAdmin');
