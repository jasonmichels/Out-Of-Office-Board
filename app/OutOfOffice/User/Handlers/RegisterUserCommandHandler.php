<?php namespace OutOfOffice\User\Handlers;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

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
     * Handle the command & register user
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        dd($command->email);
    }

} 