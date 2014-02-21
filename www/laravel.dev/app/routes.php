<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/track/get', function() {
	return App::make('TrackController')->get_tracks();
});

Route::post('/track/delete', function() {
	return App::make('TrackController')->delete_track();
});

Route::post('/track/insert', function() {
	return App::make('TrackController')->insert_track();
});

Route::post('/track/update', function() {
	return App::make('TrackController')->update_track();
});

Route::get('/track', function()
{
	return App::make('TrackController')->index();
});

Route::get('/', function()
{
	if (Auth::check())
		return Redirect::To('track');
	return Redirect::To('user/login');
});

Route::get('/user/login', function()
{
	return App::make('UserController')->index();
});

// Call authenticate controller when the user posts some login data 
Route::post('/user/login', 'UserController@login');

// Call authenticate controller when the user posts some login data 
Route::post('/track/upload', 'TrackController@upload_track');

Route::get('/user/logout', function() {
	Auth::logout();
	return Redirect::to('user/login')->with('message', 'Your are now logged out!');
});

Route::get('/*', function() {
	return Redirect::to('user/login');
});

// Uncomment this part on production
/*App::missing(function($exception)
{
    // return Response::view('errors.missing', array(), 404);
    return Redirect::to('user/login');
});*/