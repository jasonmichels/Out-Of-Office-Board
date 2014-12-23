<?php namespace OutOfOffice\User\Services;

use OutOfOffice\User\Contracts\UserAccountWasConfirmedEvent;

/**
 * Class ConfirmUser
 *
 * Confirm a user account
 *
 * @package OutOfOffice\User\Services
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class ConfirmUser
{
    /**
     * @var UserAccountWasConfirmedEvent
     */
    private $userAccountWasConfirmedEvent;

    /**
     * @param UserAccountWasConfirmedEvent $userAccountWasConfirmedEvent
     */
    public function __construct(UserAccountWasConfirmedEvent $userAccountWasConfirmedEvent)
    {
        $this->userAccountWasConfirmedEvent = $userAccountWasConfirmedEvent;
    }

    /**
     * Confirm a user account
     *
     * @param $user
     * @return \OutOfOffice\User\User
     */
    public function handle($user)
    {
        /**
         * @var $user \OutOfOffice\User\User
         */
        $user->active = true;
        $user->confirmation_code = null;
        $user->raise($this->userAccountWasConfirmedEvent->setUserId($user->id));

        return $user;
    }
}