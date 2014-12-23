<?php namespace OutOfOffice\User\Events;

use OutOfOffice\User\Interfaces\UserRepositoryInterface;
use OutOfOffice\User\User;

/**
 * Class UserAccountWasConfirmedEvent
 *
 * User email was confirmed created event
 *
 * @package OutOfOffice\User\Events
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class UserAccountWasConfirmedEvent implements \OutOfOffice\User\Contracts\UserAccountWasConfirmedEvent
{

    /**
     * @var int $userId
     */
    private $userId;

    /**
     * @var User
     */
    private $user;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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

    /**
     * Get a user
     *
     * @return User
     */
    public function getUser()
    {
        if (!$this->user) {
            $this->user = $this->userRepository->findOrFail($this->getUserId());
        }

        return $this->user;
    }


} 