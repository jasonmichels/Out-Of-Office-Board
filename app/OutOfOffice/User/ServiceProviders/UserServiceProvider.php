<?php namespace OutOfOffice\User\ServiceProviders;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class UserServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        include(__DIR__ . '/../Routes/routes.php');
        View::addNamespace('user', __DIR__ . '/../Views');

		App::bind('OutOfOffice\User\Interfaces\UserRepositoryInterface', 'OutOfOffice\User\Repositories\UserRepository');
        App::bind('OutOfOffice\User\Contracts\UserWasCreatedEvent', 'OutOfOffice\User\Events\UserWasCreatedEvent');
        App::bind('OutOfOffice\User\Contracts\UserFactory', 'OutOfOffice\User\Factory\UserFactory');
	}

}