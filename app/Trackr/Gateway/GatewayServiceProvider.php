<?php namespace Trackr\Gateway;

use Illuminate\Support\ServiceProvider;
use Trackr\Gateway\UserGateway;


class GatewayServiceProvider extends ServiceProvider
{

  public function register()
  {
    $app = $this->app;

    $app->bind('Trackr\Gateway\UserGateway', function($app){
      return new UserGateway(
        $app->make('Trackr\Repository\Users\InterfaceUsersRepository'),
        $app->make('Trackr\Repository\Departments\InterfaceDepartmentsRepository'),
        $app->make('Trackr\Repository\Attendances\InterfaceAttendancesRepository'),
        $app->make('Trackr\Services\Validation\UsersValidator')
      );
    });
  }
}