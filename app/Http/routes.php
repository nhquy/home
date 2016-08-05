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

/****************   Model binding into route **************************/
Route::model('user', 'App\User');
Route::model('usergroup', 'App\UserGroup');
Route::model('systemsettings', 'App\SystemSettings');
Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[0-9a-z-_]+');
Route::pattern('uuid', '[0-9a-z-_]+');

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
	Route::get('user/{user}/show', 'UserController@show');
	Route::get('user/{user}/edit', 'UserController@edit');
	Route::get('user/{user}/delete', 'UserController@delete');
	Route::resource('user', 'UserController');

	# User Groups
	Route::get('usergroup/data', 'UserGroupController@data');
	Route::get('usergroup/{usergroup}/show', 'UserGroupController@show');
	Route::get('usergroup/{usergroup}/edit', 'UserGroupController@edit');
	Route::get('usergroup/{usergroup}/delete', 'UserGroupController@delete');
	//Route::post('usergroup/{usergroup}/store', 'UserGroupController@store');
	Route::resource('usergroup', 'UserGroupController');
	
	# System Settings 
	Route::get('systemsettings/data', 'SystemSettingsController@data');
	Route::get('systemsettings/{systemsettings}/show', 'SystemSettingsController@show');
	Route::get('systemsettings/{systemsettings}/edit', 'SystemSettingsController@edit');
	Route::get('systemsettings/{systemsettings}/delete', 'SystemSettingsController@delete');
	Route::resource('systemsettings', 'SystemSettingsController');

	//Route::get('user/{user}/show', 'UserController@show');
	/*Route::resource('user', 'UserController', ['parameters' => [
    	'user' => 'uuid'
	]]);*/
	//Route::post('user/store', 'UserController@store');
});

Route::auth();

Route::get('/home', 'HomeController@index');
