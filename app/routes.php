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

Route::get('login',[
	'as' 		=> 'app.auth.login',
	'uses'	=> 'AuthController@getLogin'
]);

Route::post('login',[
	'as' 		=> 'app.auth.login.process',
	'uses'	=> 'AuthController@postLogin'
]);

Route::get('logout',[
	'as' 		=> 'app.auth.logout',
	'uses'	=> 'AuthController@getLogout'
]);

Route::get('forgot-password',[
	'as' 		=> 'app.auth.forgot-password',
	'uses'	=> 'AuthController@getForgotPassword'
]);

Route::post('forgot-password',[
	'as' 		=> 'app.auth.forgot-password.process',
	'uses'	=> 'AuthController@postForgotPassword'
]);

Route::group(['before' =>'auth'],function(){

	Route::get('/',[
		'as' 		=> 'app.dashboard',
		'uses'	=> 'BaseController@getDashboard'
	]);
	Route::resource('users','UsersController');
	Route::resource('projects','ProjectsController');
	Route::resource('announcements','AnnouncementsController');
	Route::resource('departments','DepartmentsController');
	Route::resource('jobs','JobsController');
	Route::resource('attendances','AttendancesController');


});
