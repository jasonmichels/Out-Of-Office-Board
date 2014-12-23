<?php namespace OutOfOffice\User\Contracts;

use OutOfOffice\User\User;

/**
 * Interface UserAccountWasConfirmedEvent
 *
 * @package OutOfOffice\User\Contracts
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
interface UserAccountWasConfirmedEvent
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getUserId();

    /**
     * @param $userId
     * @return \OutOfOffice\User\Events\UserWasCreatedEvent
     */
    public function setUserId($userId);

    /**
     * Get a user
     *
     * @return User
     */
    public function getUser();
} 