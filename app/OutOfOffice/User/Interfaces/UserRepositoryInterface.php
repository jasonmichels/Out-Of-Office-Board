<?php namespace OutOfOffice\User\Interfaces;
/**
 * User Repository Interface
 *
 * @package OutOfOffice\User\Interfaces
 */

/**
 * Class UserRepositoryInterface
 * @package OutOfOffice\User\Interfaces
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
interface UserRepositoryInterface
{
    /**
     * Get the domain owner for a domain
     *
     * @param $domain
     *
     * @return mixed
     */
    public function getDomainOwnerForDomain($domain);

    /**
     * Get paginated users list
     *
     * @param int $number
     * @return mixed
     */
    public function paginate($number);

    /**
     * Get all users
     *
     * @return mixed
     */
    public function all();

    /**
     * Create new user object
     *
     * @param array $userData
     * @return mixed
     */
    public function create($userData);

    /**
     * Get ready to create a new user
     *
     * @param $data
     * @return mixed
     */
    public function createUser($data);

    /**
     * Check if user data is valid
     *
     * @param array $input
     * @return mixed
     */
    public function isValid($input);

    /**
     * Return a user or fail
     *
     * @param int $id
     * @return mixed
     */
    public function findOrFail($id);

    /**
     * Get validation rules
     *
     * @param int $id
     * @return array
     */
    public function getValidationRules($id);

    /**
     * Update existing user
     *
     * @param $user
     * @param array $data
     * @return mixed
     */
    public function update($user, $data);

}