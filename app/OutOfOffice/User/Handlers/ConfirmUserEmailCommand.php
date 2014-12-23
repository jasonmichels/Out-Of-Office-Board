<?php namespace OutOfOffice\User\Handlers;

use OutOfOffice\Support\Contracts\ArrayableInterface;
use OutOfOffice\Support\Traits\ArrayableTrait;
use OutOfOffice\User\User;

/**
 * Class ConfirmUserEmailCommand
 *
 * Confirm user data transfer object
 *
 * @package OutOfOffice\User\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class ConfirmUserEmailCommand implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string $confirmation_code
     */
    public $confirmation_code;

    /**
     * @var User $user
     */
    public $user;

    /**
     * @param string $confirmation_code
     */
    public function __construct($confirmation_code)
    {
        $this->confirmation_code = $confirmation_code;
    }
}