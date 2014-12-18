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
     */
    public function handle($command)
    {
        $domain = $this->domainValidator->parseDomainFromEmail($command->email);

        $this->domainValidator->validateDomainIsAllowed($domain);

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
            $user = $this->userFactory->create(array_merge($command->toArray(), ['domain' => $domain, 'domain_owner' => false, 'active' => false]));
        } else {
            // if no domainOwner, they are first of their kind
            // Create the new user and make them confirm their account.
            // @TODO Also make them pay me my money
            // @TODO Send email confirmation from the event that is triggered
            $user = $this->userFactory->create(array_merge($command->toArray(), ['domain' => $domain, 'domain_owner' => true, 'active' => false]));
        }

        $this->dispatchEventsFor($user);
        return $user;
    }

} 