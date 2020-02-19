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
    return redirect('tasks');
});
Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', 'TasksController@index')->name('index');
    Route::post('/addtask', 'TasksController@store')->name('store');
    Route::get('/destroy/{id}', 'TasksController@destroy')->name('destroy');
    Route::post('/update/{id}', 'TasksController@update')->name('update');
});
