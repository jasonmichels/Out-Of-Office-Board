<?php namespace OutOfOffice\User\Services;

use Laracasts\Commander\CommandBus;
use OutOfOffice\User\Interfaces\UserRepositoryInterface;

/**
 * Class FetchUser
 *
 * Add a user object to a command
 *
 * @package OutOfOffice\User\Services
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class FetchUser implements CommandBus
{
    /**
     * @var UserRepositoryInterface $userRepository
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
     * Attach a user to the command object
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        if (!$command->user) {
            $command->user = $this->userRepository->findByFieldOrFail('confirmation_code', $command->confirmation_code);
        }

        return $command;
    }
}
