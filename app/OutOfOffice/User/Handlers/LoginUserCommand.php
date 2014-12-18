<?php namespace OutOfOffice\User\Handlers;

use OutOfOffice\Support\Contracts\ArrayableInterface;
use OutOfOffice\Support\Traits\ArrayableTrait;

/**
 * Class LoginUserCommand
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class LoginUserCommand implements ArrayableInterface
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
     * @param $email
     * @param $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

    }

}