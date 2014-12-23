<?php namespace OutOfOffice\User\Exceptions;

/**
 * Class InvalidAccountConfirmationException
 *
 * @package OutOfOffice\User\Exceptions
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class InvalidAccountConfirmationException extends \Exception
{
    /**
     * @param string $message
     */
    function __construct($message)
    {
        parent::__construct($message);
    }
} 