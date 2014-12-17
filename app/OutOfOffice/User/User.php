<?php namespace OutOfOffice\User;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;

/**
 * Class User
 *
 * @package OutOfOffice\User
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class User extends \Eloquent implements UserInterface, RemindableInterface
{
    use EventGenerator;

    protected $fillable = array('email', 'password', 'name', 'domain', 'domain_owner', 'active', 'is_admin');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    /**
     * Return if user is admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    /**
     * Get the remember token
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the remember token
     *
     * @param string $value
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the name of the remember token
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}