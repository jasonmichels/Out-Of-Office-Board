<?php namespace OutOfOffice\Support\Traits;

/**
 * Class ArrayableTrait
 *
 * @package OutOfOffice\Support\Traits
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
trait ArrayableTrait
{

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

} 