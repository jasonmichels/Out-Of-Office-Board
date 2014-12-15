<?php namespace OutOfOffice\User\Repositories;
/**
 * User Repository Implementation
 *
 * @package OutOfOffice\User\Repositories
 */

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use OutOfOffice\User\Interfaces\UserRepositoryInterface;
use OutOfOffice\User\User;

/**
 * User Repository Implementation
 *
 * Class UserRepository
 * @package OutOfOffice\User\Repositories
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * Get validation rules
     *
     * @param int $id
     * @return array
     */
    public function getValidationRules($id = 0)
    {
        return array(
            'email' => array('required', 'email', 'unique:users,email,' . $id),
            'password' => 'required_without:id|min:4|confirmed',
            'name' => 'required',
        );
    }

    /**
     * Paginate eloquent model
     *
     * @param int $num
     * @return mixed
     */
    public function paginate($num)
    {
        return User::paginate($num);
    }

    /**
     * Get all user objects
     *
     * @return mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Create a new user
     *
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return User::create($data);
    }

    /**
     * Create a new admin user
     *
     * @param $data
     * @return mixed
     */
    public function createUser($data)
    {
        $admin = (array_key_exists('is_admin', $data) && Auth::check() && Auth::user()->isAdmin()) ? true : false;

        // Create a new user
        $userData = array(
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'active' => true,
            'is_admin' => $admin,
        );

        $user = $this->create($userData);

        return $user;
    }

    /**
     * Determine if the user rules are valid for input
     *
     * @param $input
     * @param int $id
     * @return mixed
     */
    public function isValid($input, $id = 0)
    {
        return Validator::make($input, $this->getValidationRules($id));
    }

    /**
     * Return user model or exception gets bubbled up by eloquent
     *
     * @param int $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update eloquent user model
     *
     * @param $user
     * @param array $data
     * @return mixed
     */
    public function update($user, $data)
    {
        $admin = (array_key_exists('is_admin', $data) && Auth::check() && Auth::user()->isAdmin()) ? true : false;

        $user->email = $data['email'];
        $user->name = $data['name'];
        array_key_exists('active', $data) ? $user->active = true : $user->active = false;
        $user->is_admin = $admin;
        (array_key_exists('password', $data) && !empty($data['password'])) ? $user->password = Hash::make($data['password']) : false;

        $user->save();
        return $user;
    }
}