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
Route::model('userpermissions', 'App\UserPermissions');
Route::model('content', 'App\Content');
Route::model('locales', 'App\Locales');
Route::model('permissions', 'App\Permissions');
Route::model('group', 'App\Groups');
Route::model('groupspermissions', 'App\GroupsPermissions');
Route::model('media', 'App\Media');
Route::model('categories', 'App\Category');
Route::model('menu', 'App\Menu');
Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[0-9a-z-_]+');
Route::pattern('uuid', '[0-9a-z-_]+');

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');

Route::group(['namespace' => 'Admin', /*'middleware' => ['auth'], */'prefix' => 'admin'], function () {
	//Dashboard Route
	/*Route::get('/', function() {
		return view('admin.index');
	});*/

	Route::get('/', array(
				'as'    => 'user',
				'uses'  => 'UserController@index'
	));
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
  Route::post('systemsettings/save', 'SystemSettingsController@save');
	Route::resource('systemsettings', 'SystemSettingsController');

	# User Permissions
	Route::get('userpermissions/data', 'UserPermissionsController@data');
	Route::get('userpermissions/{userpermissions}/show', 'UserPermissionsController@show');
	Route::get('userpermissions/{userpermissions}/edit', 'UserPermissionsController@edit');
	Route::get('userpermissions/{userpermissions}/delete', 'UserPermissionsController@delete');
	Route::resource('userpermissions', 'UserPermissionsController');

	# Locales
	Route::get('locales/data', 'LocalesControler@data');
	Route::get('locales/{locales}/show', 'LocalesControler@show');
	Route::get('locales/{locales}/edit', 'LocalesControler@edit');
	Route::get('locales/{locales}/delete', 'LocalesControler@delete');
	Route::resource('locales', 'LocalesControler');

	# Contents
	Route::get('content/data', 'ContentController@data');
	Route::get('content/{content}/show', 'ContentController@show');
	Route::get('content/{content}/edit', 'ContentController@edit');
	Route::get('content/{content}/delete', 'ContentController@delete');
	Route::resource('content', 'ContentController');

	# Permissions
	Route::get('permissions/data', 'PermissionController@data');
	Route::get('permissions/{permissions}/show', 'PermissionController@show');
	Route::get('permissions/{permissions}/edit', 'PermissionController@edit');
	Route::get('permissions/{permissions}/delete', 'PermissionController@delete');
	Route::resource('permissions', 'PermissionController');

	# Groups
	Route::get('group/data', 'GroupController@data');
	Route::get('group/{group}/show', 'GroupController@show');
	Route::get('group/{group}/edit', 'GroupController@edit');
	Route::get('group/{group}/delete', 'GroupController@delete');
	Route::resource('group', 'GroupController');

	# Groups Permissions
	Route::get('groupspermissions/data', 'GroupPermissionController@data');
	Route::get('groupspermissions/{groupspermissions}/show', 'GroupPermissionController@show');
	Route::get('groupspermissions/{groupspermissions}/edit', 'GroupPermissionController@edit');
	Route::get('groupspermissions/{groupspermissions}/delete', 'GroupPermissionController@delete');
	Route::resource('groupspermissions', 'GroupPermissionController');

	# Media
	Route::get('media/data', 'MediaController@data');
	Route::get('media/{media}/show', 'MediaController@show');
	Route::get('media/{media}/edit', 'MediaController@edit');
	Route::get('media/{media}/delete', 'MediaController@delete');
	Route::resource('media', 'MediaController');

	# Menu
	Route::get('menu/data', 'MenuController@data');
	Route::get('menu/{menu}/show', 'MenuController@show');
	Route::get('menu/{menu}/edit', 'MenuController@edit');
	Route::get('menu/{menu}/delete', 'MenuController@delete');
	Route::resource('menu', 'MenuController');

	# Cateogries
	Route::get('categories/data', 'CategoryController@data');
	Route::get('categories/{categories}/show', 'CategoryController@show');
	Route::get('categories/{categories}/edit', 'CategoryController@edit');
	Route::get('categories/{categories}/delete', 'CategoryController@delete');
	Route::resource('categories', 'CategoryController');
	//Route::get('user/{user}/show', 'UserController@show');
	/*Route::resource('user', 'UserController', ['parameters' => [
    	'user' => 'uuid'
	]]);*/
	//Route::post('user/store', 'UserController@store');
});

Route::auth();

Route::get('/home', 'HomeController@index');
