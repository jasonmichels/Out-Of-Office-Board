<?php namespace OutOfOffice\User\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class RegisterUserForm
 * @package OutOfOffice\User\Forms
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class RegisterUserForm extends FormValidator
{
    /**
     * Validation rules for registering a new user
     *
     * @var array
     */
    protected $rules = [
        'email' => array('required', 'email', 'unique:users,email'),
        'password' => 'required_without:id|min:4|confirmed',
        'name' => 'required',
    ];

} 