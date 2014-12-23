<?php namespace OutOfOffice\User\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class ConfirmUserEmailForm
 *
 * Validation rules to check that the confirmation_code exists
 *
 * @package OutOfOffice\User\Forms
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class ConfirmUserEmailForm extends FormValidator
{
    /**
     * Validation rules for confirming a users email
     *
     * @var array
     */
    protected $rules = [
        'confirmation_code' => array('required', 'exists:users,confirmation_code'),
    ];

}
