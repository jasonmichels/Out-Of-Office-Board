<?php namespace OutOfOffice\User\Events;

/**
 * Class UserWasCreated
 *
 * User was created event
 *
 * @package OutOfOffice\User\Events
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class UserWasCreated
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
     * @return UserWasCreated
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }


} 