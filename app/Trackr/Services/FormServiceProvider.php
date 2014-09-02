<?php namespace Trackr\Services;

use Illuminate\Support\ServiceProvider;
use Trackr\Services\Users\UserService;


class FormServiceProvider extends ServiceProvider
{

  public function register()
  {
    $app = $this->app;

    $app->bind('Trackr\Services\User\UserService', function($app){
      return new UserService(
        $app->make('Trackr\Repository\Users\InterfaceUsersRepository'),
        $app->make('Trackr\Repository\Departments\InterfaceDepartmentsRepository'),
        $app->make('Trackr\Repository\Attendances\InterfaceAttendancesRepository')
      );
    });
  }
}