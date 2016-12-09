<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/reminder/index', ['as'=> 'reminder', 'uses'=> 'ReminderController@index']);
	Route::get('/reminder/add', ['as'=> 'reminder-add', 'uses'=> 'ReminderController@add']);
	Route::post('/reminder/insert', ['as'=> 'reminder-insert', 'uses'=> 'ReminderController@insert']);
	Route::get('/reminder/edit/{id}', ['as'=> 'reminder-edit', 'uses'=> 'ReminderController@edit']);
	Route::post('/reminder/update', ['as'=> 'reminder-update', 'uses'=> 'ReminderController@update']);
	Route::get('/reminder/delete/{id}', ['as'=> 'reminder-delete', 'uses'=> 'ReminderController@delete']);
});
