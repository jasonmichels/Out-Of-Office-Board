<?php namespace OutOfOffice\Support\Contracts;

/**
 * Interface ArrayableInterface
 * @package OutOfOffice\Support\Contracts
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
interface ArrayableInterface
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray();
} 