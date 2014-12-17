<?php namespace OutOfOffice\User\Factory;

use OutOfOffice\User\Contracts\UserWasCreatedEvent;
use OutOfOffice\User\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserFactory
 *
 * Create a new user
 *
 * @package OutOfOffice\User\Factory
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class UserFactory implements \OutOfOffice\User\Contracts\UserFactory
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var UserWasCreatedEvent
     */
    private $userWasCreatedEvent;

    /**
     * @param User $user
     * @param UserWasCreatedEvent $userWasCreatedEvent
     */
    public function __construct(User $user, UserWasCreatedEvent $userWasCreatedEvent)
    {
        $this->user = $user;
        $this->userWasCreatedEvent = $userWasCreatedEvent;
    }

    /**
     * Create a new user
     *
     * @param array $userData
     * @return User
     */
    public function create(array $userData)
    {
        // Check if they should be an admin
        (array_key_exists('is_admin', $userData) && Auth::check() && Auth::user()->isAdmin()) ? true : false;

        $this->user->email = $userData['email'];
        $this->user->password = Hash::make($userData['password']);
        $this->user->name = $userData['name'];
        $this->user->domain = $userData['domain'];
        $this->user->domain_owner = $userData['domain_owner'];
        $this->user->active = true;

        $this->user->save();

        $this->user->raise($this->userWasCreatedEvent->setUserId($this->user->id));

        return $this->user;
    }
} 