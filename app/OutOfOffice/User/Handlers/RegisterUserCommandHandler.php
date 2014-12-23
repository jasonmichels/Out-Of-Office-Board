<?php namespace OutOfOffice\User\Handlers;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use OutOfOffice\User\Contracts\UserFactory;
use OutOfOffice\User\Interfaces\UserRepositoryInterface;
use OutOfOffice\User\User;

/**
 * Class RegisterUserCommandHandler
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class RegisterUserCommandHandler implements CommandHandler
{
    use DispatchableTrait;

    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param UserFactory             $userFactory
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserFactory $userFactory, UserRepositoryInterface $userRepository)
    {
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
    }

    /**
     * Handle creating a new user
     *
     * @param $command
     *
     * @return mixed|User
     */
    public function handle($command)
    {
        $user = $this->userFactory->createUser($command);

        $this->dispatchEventsFor($user);

        return $user;
    }

}
