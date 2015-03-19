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
Route::get('home/listen', ['as' => 'listen', 'uses' => 'ShowController@schedule']);
Route::get('about', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);

Route::get('hockey', ['as' => 'hockey', 'uses' => 'HockeyController@index']);
Route::get('askdestler', ['as' => 'askdestler', 'uses' => 'ShowController@schedule']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('shows', ['as' => 'shows.index', 'uses' => 'ShowController@schedule']);
Route::get('shows/schedule', ['as' => 'shows.schedule', 'uses' => 'ShowController@schedule']);
Route::get('shows/specialty', ['as' => 'shows.specialty', 'uses' => 'ShowController@schedule']);
Route::get('shows/pulse', ['as' => 'shows.pulse', 'uses' => 'ShowController@schedule']);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
	Route::get('/eboard', ['as' => 'admin.eboard.index', 'uses' => 'EboardController@index']);
	Route::get('/eboard/create', ['as' => 'admin.eboard.create', 'uses' => 'EboardController@new_position']);
	Route::post('/eboard/create', ['as' => 'admin.eboard.create.save', 'uses' => 'EboardController@create']);
	Route::get('eboard/{id}', ['as' => 'admin.eboard.edit', 'uses' => 'EboardController@edit']);
	Route::put('eboard/{id}', ['as' => 'admin.eboard.update', 'uses' => 'EboardController@update']);
	Route::delete('eboard/{id}', ['as' => 'admin.eboard.delete', 'uses' => 'EboardController@delete']);
	Route::get('/', ['as' => 'admin.permissions.roles', 'uses' => 'AdminController@index']);
	Route::get('/', ['as' => 'admin.permissions.user_roles', 'uses' => 'AdminController@index']);

	Route::get('/schedule', ['as' => 'admin.schedule', 'uses' => 'ScheduleController@index']);
	Route::put('/schedule/update', ['as' => 'admin.schedule.update', 'uses' => 'ScheduleController@update']);
	
	Route::get('/', ['as' => 'admin.users', 'uses' => 'AdminController@index']);
	
	Route::get('/shows', ['as' => 'admin.shows.index', 'uses' => 'ShowController@index']);
	Route::get('/shows/create', ['as' => 'admin.shows.create', 'uses' => 'ShowController@new_show']);
	Route::post('/shows/create', ['as' => 'admin.shows.create.save', 'uses' => 'ShowController@create']);
	Route::get('shows/{id}', ['as' => 'admin.shows.edit', 'uses' => 'ShowController@edit']);
	Route::put('shows/{id}', ['as' => 'admin.shows.update', 'uses' => 'ShowController@update']);
	Route::delete('shows/{id}', ['as' => 'admin.shows.delete', 'uses' => 'ShowController@delete']);
	
	Route::get('/events', ['as' => 'admin.events.index', 'uses' => 'EventController@index']);
	Route::get('/events/create', ['as' => 'admin.events.create', 'uses' => 'EventController@new_event']);
	Route::post('/events/create', ['as' => 'admin.events.create.save', 'uses' => 'EventController@create']);
	Route::get('events/{id}', ['as' => 'admin.events.edit', 'uses' => 'EventController@edit']);
	Route::put('events/{id}', ['as' => 'admin.events.update', 'uses' => 'EventController@update']);
	Route::delete('events/{id}', ['as' => 'admin.events.delete', 'uses' => 'EventController@delete']);
	
	Route::get('/reviews', ['as' => 'admin.reviews.index', 'uses' => 'AlbumReviewController@index']);
	Route::get('/reviews/create', ['as' => 'admin.reviews.create', 'uses' => 'AlbumReviewController@new_review']);
	Route::post('/reviews/create', ['as' => 'admin.reviews.create.save', 'uses' => 'AlbumReviewController@create']);
	Route::get('reviews/{id}', ['as' => 'admin.reviews.edit', 'uses' => 'AlbumReviewController@edit']);
	Route::put('reviews/{id}', ['as' => 'admin.reviews.update', 'uses' => 'AlbumReviewController@update']);
	Route::delete('reviews/{id}', ['as' => 'admin.reviews.delete', 'uses' => 'AlbumReviewController@delete']);
	
	Route::get('/videos', ['as' => 'admin.videos.index', 'uses' => 'VideoController@index']);
	Route::get('/videos/create', ['as' => 'admin.videos.create', 'uses' => 'VideoController@new_review']);
	Route::post('/videos/create', ['as' => 'admin.videos.create.save', 'uses' => 'VideoController@create']);
	Route::get('videos/{id}', ['as' => 'admin.videos.edit', 'uses' => 'VideoController@edit']);
	Route::put('videos/{id}', ['as' => 'admin.videos.update', 'uses' => 'VideoController@update']);
	Route::delete('videos/{id}', ['as' => 'admin.videos.delete', 'uses' => 'VideoController@delete']);
});
