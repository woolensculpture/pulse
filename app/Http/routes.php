<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('home/listen', ['as' => 'listen', 'uses' => 'HomeController@listen']);
Route::get('home/zomgdanmansen/69', ['as' => 'default', 'uses' => 'HomeController@defaultDan']);
Route::get('about', ['as' => 'about', 'uses' => 'HomeController@about']);
Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);

Route::get('hockey', ['as' => 'hockey', 'uses' => 'HockeyController@index']);
Route::get('askdestler', ['as' => 'askdestler', 'uses' => 'AskDestlerController@index']);
Route::post('askdestler', ['as' => 'askdestler.submit', 'uses' => 'AskDestlerController@submit']);

Route::get('login', ['uses' => 'Auth\AuthController@login']);
Route::get('logout', ['uses' => 'Auth\AuthController@logout']);
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);
Route::post('auth/login', ['as' => 'auth.authenticate', 'uses' => 'Auth\AuthController@authenticate']);
Route::controller('password', 'Auth\PasswordController');

Route::get('shows', ['as' => 'shows.index', 'uses' => 'ShowController@schedule']);
Route::get('shows/schedule', ['as' => 'shows.schedule', 'uses' => 'ShowController@schedule']);
Route::get('shows/specialty', ['as' => 'shows.specialty', 'uses' => 'ShowController@schedule']);
Route::get('shows/pulse', ['as' => 'shows.pulse', 'uses' => 'ShowController@schedule']);

Route::get('dj', ['as' => 'dj.index', 'uses' => 'DJController@index']);
Route::get('dj/listeners/{studio?}', ['as' => 'dj.listeners', 'uses' => 'DJController@listeners']);
Route::get('dj/top', ['as' => 'dj.charts', 'uses' => 'DJController@topWeek']);
Route::get('dj/support', ['as' => 'dj.support', 'uses' => 'DJController@ticketForm']);
Route::post('dj/support', ['as' => 'dj.support.create', 'uses' => 'DJController@submitTicket']);
Route::get('dj/file/{file}', ['as' => 'dj.file', 'uses' => 'DJController@fetchFile']);
