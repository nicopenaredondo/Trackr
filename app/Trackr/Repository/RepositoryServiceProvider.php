<?php namespace Trackr\Repository;

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

		//Group Repository
		/*$app->bind(
			'IPostMo\Repository\Groups\InterfaceGroupRepository',
			function(){
				return new EloquentGroupRepository(new Group);
			});*/

	}
}