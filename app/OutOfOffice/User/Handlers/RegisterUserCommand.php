<?php namespace OutOfOffice\User\Handlers;

use OutOfOffice\Support\Contracts\ArrayableInterface;
use OutOfOffice\Support\Traits\ArrayableTrait;

/**
 * Class RegisterUserCommand
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class RegisterUserCommand implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $password_confirmation;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string $domain Domain stripped from the email
     */
    public $domain;

    /**
     * @param $email
     * @param $password
     * @param $password_confirmation
     * @param $name
     */
    public function __construct($email, $password, $password_confirmation, $name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
        $this->name = $name;

    }

}