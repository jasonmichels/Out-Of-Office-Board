<?php namespace OutOfOffice\User\Factory;

use OutOfOffice\User\Contracts\UserWasCreatedEvent;
use OutOfOffice\User\Interfaces\UserRepositoryInterface;
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
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param User $user
     * @param UserWasCreatedEvent $userWasCreatedEvent
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(User $user, UserWasCreatedEvent $userWasCreatedEvent, UserRepositoryInterface $userRepository)
    {
        $this->user = $user;
        $this->userWasCreatedEvent = $userWasCreatedEvent;
        $this->userRepository = $userRepository;
    }

    /**
     * @param $domain
     * @param $command
     * @return User
     * @throws \Exception
     */
    public function createUser($domain, $command)
    {
        //check to see if domain owner exists in the database
        $domainOwner = $this->userRepository->getDomainOwnerForDomain($domain);

        if ($domainOwner) {
            // domain exists, make sure account is paid in full
            if (!$domainOwner->active) {
                throw new \Exception('Account is not active. You can re-active the account somehow??');
            }
            // if paid in full (active) then create new account
            // they are not domain owner so create them as not domain owner
            // @TODO Send email confirmation from the event that is triggered
            return $this->createDomainUser($domain, $command->toArray());
        }
            // if no domainOwner, they are first of their kind
            // Create the new user and make them confirm their account.
            // @TODO Also make them pay me my money
            // @TODO Send email confirmation from the event that is triggered
        return $this->createDomainOwner($domain, $command->toArray());
    }

    /**
     * Create a domain owner
     *
     * @param string $domain
     * @param array $userInfo
     * @param bool $active
     * @return User
     */
    protected function createDomainOwner($domain, array $userInfo, $active = false)
    {
        return $this->create(array_merge($userInfo, ['domain' => $domain, 'domain_owner' => true, 'active' => $active]));
    }

    /**
     * Create a user that is not a domain owner, but an "employee" for lack of better term
     *
     * @param string $domain
     * @param array $userInfo
     * @param bool $active
     * @return User
     */
    protected function createDomainUser($domain, array $userInfo, $active = false)
    {
        return $this->create(array_merge($userInfo, ['domain' => $domain, 'domain_owner' => false, 'active' => $active]));
    }

    /**
     * Create a new user
     *
     * @param array $userData
     * @return User
     */
    private function create(array $userData)
    {
        // Check if they should be an admin
        (array_key_exists('is_admin', $userData) && Auth::check() && Auth::user()->isAdmin()) ? true : false;

        $this->user->email = $userData['email'];
        $this->user->password = Hash::make($userData['password']);
        $this->user->name = $userData['name'];
        $this->user->domain = $userData['domain'];
        $this->user->domain_owner = $userData['domain_owner'];
        $this->user->confirmation_code = str_random(40);
        $this->user->active = $userData['active'];

        $this->user->save();

        $this->user->raise($this->userWasCreatedEvent->setUserId($this->user->id));

        return $this->user;
    }
} 