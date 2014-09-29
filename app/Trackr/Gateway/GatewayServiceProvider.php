<?php namespace Trackr\Gateway;

use Illuminate\Support\ServiceProvider;
use Trackr\Gateway\UserGateway;
use Trackr\Gateway\JobGateway;

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

    $app->bind('Trackr\Gateway\JobGateway', function($app){
      return new JobGateway(
        $app->make('Trackr\Repository\Jobs\InterfaceJobsRepository'),
        $app->make('Trackr\Repository\Departments\InterfaceDepartmentsRepository'),
        $app->make('Trackr\Services\Validation\JobsValidator')
      );
    });
  }
}