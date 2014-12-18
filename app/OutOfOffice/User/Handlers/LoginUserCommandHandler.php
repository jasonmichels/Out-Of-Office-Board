<?php namespace OutOfOffice\User\Handlers;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Illuminate\Support\Facades\Auth;
use OutOfOffice\User\Exceptions\InvalidLoginException;

/**
 * Class LoginUserCommandHandler
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class LoginUserCommandHandler implements CommandHandler
{
    use DispatchableTrait;

    /**
     * Attempt to login a user
     *
     * @param $command
     *
     * @return mixed|void
     * @throws InvalidLoginException
     */
    public function handle($command)
    {
        if (!Auth::attempt(
            array(
                'email' => $command->email,
                'password' => $command->password,
            ),
            true
        ))
        {
            throw new InvalidLoginException('We were not able to authenticate your account. PLease try again');
        }
    }

} 