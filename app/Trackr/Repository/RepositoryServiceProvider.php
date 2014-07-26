<?php namespace Trackr\Repository;

use User, UserProfile;
use Department;
use Job;
use Project;
use Trackr\Repository\Users\EloquentUsersRepository;
use Trackr\Repository\Departments\EloquentDepartmentsRepository;
use Trackr\Repository\Jobs\EloquentJobsRepository;
use Trackr\Repository\Projects\EloquentProjectsRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{

	/**
	 * Register the repositories
	 *
	 * @return void
	 */

	public function register()
	{
		$app = $this->app;

		//Users Repository
		$app->bind(
			'Trackr\Repository\Users\InterfaceUsersRepository',
		function(){
				return new EloquentUsersRepository(new User, new UserProfile);
		});

		//Departments Repository
		$app->bind(
			'Trackr\Repository\Departments\InterfaceDepartmentsRepository',
		function(){
				return new EloquentDepartmentsRepository(new Department);
		});

		//Jobs Repository
		$app->bind(
			'Trackr\Repository\Jobs\InterfaceJobsRepository',
		function(){
				return new EloquentJobsRepository(new Job);
		});

		//Projects Repository
		$app->bind(
			'Trackr\Repository\Projects\InterfaceProjectsRepository',
		function(){
				return new EloquentProjectsRepository(new Project);
		});

	}
}