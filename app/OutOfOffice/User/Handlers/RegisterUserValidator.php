<?php namespace OutOfOffice\User\Handlers;

use OutOfOffice\User\Forms\RegisterUserForm;
use OutOfOffice\User\Handlers\RegisterUserCommand;

/**
 * Class RegisterUserValidator
 *
 * Validate the register user command
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class RegisterUserValidator
{

    /**
     * @var RegisterUserForm
     */
    private $form;

    /**
     * @param RegisterUserForm $form
     */
    public function __construct(RegisterUserForm $form)
    {
        $this->form = $form;
    }

    /**
     * Validate the user registration
     *
     * @param RegisterUserCommand $command
     */
    public function validate(RegisterUserCommand $command)
    {
        $this->form->validate($command->toArray());
    }
}
