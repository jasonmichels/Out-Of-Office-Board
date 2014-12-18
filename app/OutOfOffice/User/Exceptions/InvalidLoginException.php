<?php namespace OutOfOffice\User\Exceptions;

/**
 * Class InvalidLoginException
 *
 * @package OutOfOffice\User\Exceptions
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class InvalidLoginException extends \Exception
{
    /**
     * @param string $message
     */
    function __construct($message)
    {
        parent::__construct($message);
    }
} 