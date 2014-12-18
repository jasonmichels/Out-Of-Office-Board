<?php namespace OutOfOffice\User\Listeners;

use OutOfOffice\User\Contracts\UserWasCreatedEvent;
use Laracasts\Commander\Events\EventListener;

/**
 * Send email confirmation when user is created
 *
 * Class EmailConfirmation
 *
 * @package OutOfOffice\User\Listeners
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class EmailConfirmation extends EventListener
{
    /**
     * @param UserWasCreatedEvent $userWasCreated
     */
    public function whenUserWasCreated(UserWasCreatedEvent $userWasCreated)
    {
        // @TODO If you want to send out notifications, do something here.
    }
}
