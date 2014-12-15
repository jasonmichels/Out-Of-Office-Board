<?php namespace OutOfOffice\Status\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class StatusServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        include(__DIR__ . '/../Routes/routes.php');
        View::addNamespace('status', __DIR__ . '/../Views');
	}

}