<?php namespace OutOfOffice\User\Handlers;

use OutOfOffice\User\Forms\LoginUserForm;
use OutOfOffice\User\Handlers\LoginUserCommand;

/**
 * Class LoginUserValidator
 *
 * Validate the login user command
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class LoginUserValidator
{

    /**
     * @var LoginUserForm
     */
    private $form;

    /**
     * @param LoginUserForm $form
     */
    public function __construct(LoginUserForm $form)
    {
        $this->form = $form;
    }

    /**
     * Validate the user registration
     *
     * @param LoginUserCommand $command
     */
    public function validate(LoginUserCommand $command)
    {
        $this->form->validate($command->toArray());
    }


} 