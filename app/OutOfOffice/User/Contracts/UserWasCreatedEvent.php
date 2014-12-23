<?php namespace OutOfOffice\User\Contracts;

use OutOfOffice\User\User;

/**
 * Interface UserWasCreatedEvent
 * @package OutOfOffice\User\Contracts
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
interface UserWasCreatedEvent
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