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
     * Create a new user
     *
     * @param array $userData
     * @return User
     */
    public function create(array $userData);
} 