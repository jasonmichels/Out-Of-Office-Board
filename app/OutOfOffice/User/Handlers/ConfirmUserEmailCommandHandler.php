<?php namespace OutOfOffice\User\Handlers;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use OutOfOffice\User\Services\ConfirmUser;

/**
 * Class ConfirmUserEmailCommandHandler
 *
 * Confirm user email command handler
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class ConfirmUserEmailCommandHandler implements CommandHandler
{
    use DispatchableTrait;

    /**
     * @var ConfirmUser
     */
    private $confirmUser;

    /**
     * @param ConfirmUser $confirmUser
     */
    public function __construct(ConfirmUser $confirmUser)
    {
        $this->confirmUser = $confirmUser;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = $this->confirmUser->handle($command->user);
        $user->save();

        $this->dispatchEventsFor($user);

        return $user;
    }
}