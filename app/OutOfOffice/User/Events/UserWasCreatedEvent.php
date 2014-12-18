<?php namespace OutOfOffice\User\Events;

/**
 * Class UserWasCreatedEvent
 *
 * User was created event
 *
 * @package OutOfOffice\User\Events
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class UserWasCreatedEvent implements \OutOfOffice\User\Contracts\UserWasCreatedEvent
{

    /**
     * @var int $userId
     */
    private $userId;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getUserId()
    {
        if (!$this->userId) {
            throw new \Exception('User ID must be set to handle event');
        }
        return $this->userId;
    }

    /**
     * @param $userId
     * @return UserWasCreatedEvent
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }


} 