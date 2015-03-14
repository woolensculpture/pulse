<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/about', ['as' => 'about', 'uses' => 'HomeController@about']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('shows', ['as' => 'shows.index', 'uses' => 'ShowController@schedule']);
Route::get('shows/schedule', ['as' => 'shows.schedule', 'uses' => 'ShowController@schedule']);
Route::get('shows/specialty', ['as' => 'shows.specialty', 'uses' => 'ShowController@schedule']);
Route::get('shows/pulse', ['as' => 'shows.pulse', 'uses' => 'ShowController@schedule']);

Route::get('events', ['as' => 'events.index', 'uses' => 'ShowController@schedule']);
Route::get('contact', ['as' => 'contact', 'uses' => 'ShowController@schedule']);
Route::get('hockey', ['as' => 'hockey', 'uses' => 'ShowController@schedule']);
Route::get('askdestler', ['as' => 'askdestler', 'uses' => 'ShowController@schedule']);
Route::get('home/listen', ['as' => 'listen', 'uses' => 'ShowController@schedule']);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
	Route::get('/eboard', ['as' => 'admin.eboard.eboard', 'uses' => 'EboardController@index']);
	Route::get('/eboard/new_position', ['as' => 'admin.eboard.new_position', 'uses' => 'EboardController@new_position']);
	Route::post('/eboard/new_position', ['as' => 'admin.eboard.new_position.save', 'uses' => 'EboardController@create']);
	Route::get('eboard/edit/{id}', ['as' => 'admin.eboard.edit', 'uses' => 'EboardController@edit']);
	Route::put('eboard/edit/{id}', ['as' => 'admin.eboard.update', 'uses' => 'EboardController@update']);
	Route::delete('eboard/{id}', ['as' => 'admin.eboard.delete', 'uses' => 'EboardController@delete']);
	Route::get('/', ['as' => 'admin.permissions.roles', 'uses' => 'AdminController@index']);
	Route::get('/', ['as' => 'admin.permissions.user_roles', 'uses' => 'AdminController@index']);

	Route::get('/schedule', ['as' => 'admin.schedule', 'uses' => 'ScheduleController@index']);
	Route::put('/schedule/update', ['as' => 'admin.schedule.update', 'uses' => 'ScheduleController@update']);
	
	Route::get('/', ['as' => 'admin.shows', 'uses' => 'AdminController@index']);
	Route::get('/', ['as' => 'admin.slider', 'uses' => 'AdminController@index']);
	Route::get('/', ['as' => 'admin.users', 'uses' => 'AdminController@index']);
	Route::get('/', ['as' => 'admin.reviews', 'uses' => 'AdminController@index']);
	Route::get('/', ['as' => 'admin.video', 'uses' => 'AdminController@index']);
	Route::get('/', ['as' => 'admin.contest.view_entries', 'uses' => 'AdminController@index']);
});
