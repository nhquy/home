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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', /*'middleware' => ['auth'], */'prefix' => 'admin'], function () {
	//Dashboard Route
	Route::get('/', function() {
		return view('admin.index');
	});

	//Route::get('/', array('as' => 'admin', 'uses' => 'LoginController@index'));
	# Users
	Route::get('user/data', 'UserController@data');

	//Route::get('user/{user}/show', 'UserController@show');
	Route::resource('user', 'UserController', ['parameters' => [
    	'user' => 'uuid'
	]]);
	//Route::post('user/store', 'UserController@store');
});

Route::auth();

Route::get('/home', 'HomeController@index');
