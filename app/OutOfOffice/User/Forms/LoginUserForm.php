<?php namespace OutOfOffice\User\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class LoginUserForm
 * @package OutOfOffice\User\Forms
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class LoginUserForm extends FormValidator
{
    /**
     * Validation rules for logging in a user
     *
     * @var array
     */
    protected $rules = [
        'email' => array('required', 'email'),
        'password' => 'required',
    ];

} 