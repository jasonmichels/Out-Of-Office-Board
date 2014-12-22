<?php namespace OutOfOffice\User\Contracts;

use OutOfOffice\User\User;

/**
 * Interface UserFactory
 *
 * @package OutOfOffice\User\Contracts
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
interface UserFactory
{

    /**
     * Create a user new
     *
     * @param $domain
     * @param $command
     * @return User
     * @throws \Exception
     */
    public function createUser($domain, $command);
} 