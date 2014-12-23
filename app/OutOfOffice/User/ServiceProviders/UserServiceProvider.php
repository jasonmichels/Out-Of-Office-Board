<?php namespace OutOfOffice\User\ServiceProviders;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;

/**
 * Class UserServiceProvider
 *
 * @package OutOfOffice\User\ServiceProviders
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
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
        App::bind('OutOfOffice\User\Contracts\UserAccountWasConfirmedEvent', 'OutOfOffice\User\Events\UserAccountWasConfirmedEvent');
        App::bind('OutOfOffice\User\Contracts\UserFactory', 'OutOfOffice\User\Factory\UserFactory');
        App::bind('OutOfOffice\User\Contracts\DomainValidator', 'OutOfOffice\User\Services\ArrayDomainValidator');

        $this->registerEventListeners();
	}

    /**
     * Register any necessary user event listeners
     */
    public function registerEventListeners()
    {
        Event::listen('OutOfOffice.User.*', 'OutOfOffice\User\Listeners\EmailConfirmation');
        Event::listen('OutOfOffice.User.*', 'OutOfOffice\User\Listeners\AccountConfirmationNotifier');
    }

}
