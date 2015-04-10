<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);

Route::get('/eboard', ['as' => 'admin.eboard.index', 'uses' => 'EboardController@index']);
Route::get('/eboard/create', ['as' => 'admin.eboard.create', 'uses' => 'EboardController@new_position']);
Route::post('/eboard/create', ['as' => 'admin.eboard.create.save', 'uses' => 'EboardController@create']);
Route::get('eboard/{id}', ['as' => 'admin.eboard.edit', 'uses' => 'EboardController@edit']);
Route::put('eboard/{id}', ['as' => 'admin.eboard.update', 'uses' => 'EboardController@update']);
Route::delete('eboard/{id}', ['as' => 'admin.eboard.delete', 'uses' => 'EboardController@delete']);

Route::get('/schedule', ['as' => 'admin.schedule', 'uses' => 'ScheduleController@index']);
Route::put('/schedule/update', ['as' => 'admin.schedule.update', 'uses' => 'ScheduleController@update']);

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

Route::get('/shows', ['as' => 'admin.shows.index', 'uses' => 'ShowController@index']);
Route::get('/shows/create', ['as' => 'admin.shows.create', 'uses' => 'ShowController@new_show']);
Route::post('/shows/create', ['as' => 'admin.shows.create.save', 'uses' => 'ShowController@create']);
Route::get('shows/{id}', ['as' => 'admin.shows.edit', 'uses' => 'ShowController@edit']);
Route::put('shows/{id}', ['as' => 'admin.shows.update', 'uses' => 'ShowController@update']);
Route::delete('shows/{id}', ['as' => 'admin.shows.delete', 'uses' => 'ShowController@delete']);

Route::get('/users', ['as' => 'admin.users.index', 'uses' => 'UserController@index']);
Route::get('/users/create', ['as' => 'admin.users.create', 'uses' => 'UserController@new_user']);
Route::post('/users/create', ['as' => 'admin.users.create.save', 'uses' => 'UserController@create']);
Route::get('users/{id}', ['as' => 'admin.users.edit', 'uses' => 'UserController@edit']);
Route::put('users/{id}', ['as' => 'admin.users.update', 'uses' => 'UserController@update']);
Route::delete('users/{id}', ['as' => 'admin.users.delete', 'uses' => 'UserController@delete']);

Route::get('/videos', ['as' => 'admin.videos.index', 'uses' => 'VideoController@index']);
Route::get('/videos/create', ['as' => 'admin.videos.create', 'uses' => 'VideoController@new_review']);
Route::post('/videos/create', ['as' => 'admin.videos.create.save', 'uses' => 'VideoController@create']);
Route::get('videos/{id}', ['as' => 'admin.videos.edit', 'uses' => 'VideoController@edit']);
Route::put('videos/{id}', ['as' => 'admin.videos.update', 'uses' => 'VideoController@update']);
Route::delete('videos/{id}', ['as' => 'admin.videos.delete', 'uses' => 'VideoController@delete']);