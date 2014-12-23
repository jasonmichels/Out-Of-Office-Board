<?php namespace OutOfOffice\User\Handlers;

use OutOfOffice\User\Forms\ConfirmUserEmailForm;

/**
 * Class ConfirmUserEmailValidator
 *
 * Class to validate the confirmation code a user entered
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class ConfirmUserEmailValidator
{
    /**
     * @var ConfirmUserEmailForm $form
     */
    private $form;

    /**
     * @param ConfirmUserEmailForm $form
     */
    public function __construct(ConfirmUserEmailForm $form)
    {
        $this->form = $form;
    }

    /**
     * Validate the user submitted form
     *
     * @param ConfirmUserEmailCommand $command
     * @throws \Laracasts\Validation\FormValidationException
     */
    public function validate(ConfirmUserEmailCommand $command)
    {
        $this->form->validate($command->toArray());
    }
}
