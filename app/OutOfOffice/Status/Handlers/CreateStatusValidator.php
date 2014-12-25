<?php namespace OutOfOffice\Status\Handlers;

use Laracasts\Validation\FormValidationException;
use OutOfOffice\Status\Forms\CreateStatusForm;
use OutOfOffice\Status\Handlers\CreateStatusCommand;

/**
 * Class CreateStatusValidator
 *
 * Validate the create status form
 *
 * @package OutOfOffice\Status\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class CreateStatusValidator
{
    /**
     * @var CreateStatusForm
     */
    private $form;

    /**
     * @param CreateStatusForm $form
     */
    public function __construct(CreateStatusForm $form)
    {
        $this->form = $form;
    }

    /**
     * Validate the create status command
     *
     * @param CreateStatusCommand $command
     * @throws FormValidationException
     */
    public function validate(CreateStatusCommand $command)
    {
        $this->form->validate($command->toArray());
    }
}
