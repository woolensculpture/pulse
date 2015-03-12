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

Route::get('/about', ['as' => 'about'], function(){
	return view("about.about");
});


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
