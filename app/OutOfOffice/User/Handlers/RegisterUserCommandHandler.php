<?php namespace OutOfOffice\User\Handlers;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use OutOfOffice\User\Contracts\UserFactory;
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
     * @param UserFactory $userFactory
     */
    public function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    /**
     * Handle the command & register user
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $emailExploded = explode('@', $command->email);
        $domain = array_pop($emailExploded);

        //check to see if domain exists in the database or is part of our generic list
        $user = User::where('domain', $domain)->where('domain_owner', 1)->first();

        if ($user) {
            // domain exists, make sure account is paid in full
            if (!$user->active) {
                throw new \Exception('Account is not active. You can re-active the account somehow??');
            }
            // if paid in full (active) then create new account
            // they are not domain owner
//            $this->userFactory->create($command->toArray());

            // redirect to email confirmation page
        } else {
            // if there is not a user, check to make sure that they are allowed
        }

        dd($user);

    }

} 