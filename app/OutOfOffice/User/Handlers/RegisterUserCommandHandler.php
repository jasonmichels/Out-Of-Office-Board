<?php namespace OutOfOffice\User\Handlers;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use OutOfOffice\User\Contracts\DomainValidator;
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
     * @var DomainValidator
     */
    private $domainValidator;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param UserFactory             $userFactory
     * @param DomainValidator         $domainValidator
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserFactory $userFactory, DomainValidator $domainValidator, UserRepositoryInterface $userRepository)
    {
        $this->userFactory = $userFactory;
        $this->domainValidator = $domainValidator;
        $this->userRepository = $userRepository;
    }

    /**
     * Handle creating a new user
     *
     * @param $command
     *
     * @return mixed|User
     * @throws \Exception
     *
     * @TODO Add the domain as part of the command to move it out of the handler
     */
    public function handle($command)
    {
        $domain = $this->domainValidator->parseDomainFromEmail($command->email);

        $this->domainValidator->validateDomainIsAllowed($domain);

        $user = $this->userFactory->createUser($domain, $command);

        $this->dispatchEventsFor($user);
        return $user;
    }

} 