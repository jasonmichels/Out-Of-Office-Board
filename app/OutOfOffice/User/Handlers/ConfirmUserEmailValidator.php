<?php namespace OutOfOffice\User\Handlers;

use Laracasts\Validation\FormValidationException;
use OutOfOffice\User\Exceptions\InvalidAccountConfirmationException;
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
     * @throws InvalidAccountConfirmationException
     */
    public function validate(ConfirmUserEmailCommand $command)
    {
        try {
            $this->form->validate($command->toArray());
        } catch (FormValidationException $e) {
            throw new InvalidAccountConfirmationException($e->getMessage());
        }
    }
}
