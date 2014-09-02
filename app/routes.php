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
  'as'    => 'app.auth.login',
  'uses'  => 'AuthController@getLogin'
]);

Route::post('login',[
  'as'    => 'app.auth.login.process',
  'uses'  => 'AuthController@postLogin'
]);

Route::get('logout',[
  'as'    => 'app.auth.logout',
  'uses'  => 'AuthController@getLogout'
]);

Route::group(['before' =>'auth|check-access'],function(){

  Route::get('/',[
    'as'    => 'app.dashboard',
    'uses'  => 'BaseController@getDashboard'
  ]);
  Route::resource('users','UsersController');
  Route::resource('projects','ProjectsController');
  Route::resource('announcements','AnnouncementsController');
  Route::resource('departments','DepartmentsController');
  Route::resource('jobs','JobsController');

  Route::get('attendances/attendance-report',[
    'as'    => 'attendances.attendance-report',
    'uses'  => 'AttendancesController@attendanceReport'
  ]);

  Route::get('attendances/attendance-report/print',[
    'as'    => 'attendances.attendance-report.print',
    'uses'  => 'AttendancesController@printAttendanceReport'
  ]);

  Route::resource('attendances', 'AttendancesController');

  Route::post('tasks/remove',[
    'as'    => 'tasks.remove',
    'uses'  => 'TasksController@remove'
  ]);

  Route::post('tasks/change-status',[
    'as'    => 'tasks.change-status',
    'uses'  => 'TasksController@changeStatus'
  ]);

  Route::resource('tasks', 'TasksController');

  Route::get('change-password',[
    'as'    => 'app.change-password',
    'uses'  => 'BaseController@getChangePassword'
  ]);

  Route::post('change-password',[
    'as'    => 'app.change-password.process',
    'uses'  => 'BaseController@postChangePassword'
  ]);

  Route::get('users/{userId}/edit/reset-password',[
    'as'    => 'users.reset-password',
    'uses'  => 'UsersController@getResetPassword'
  ]);

});
