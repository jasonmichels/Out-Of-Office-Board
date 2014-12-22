<?php namespace OutOfOffice\User\Controllers;

/**
 * Manager user login/authentication
 *
 * @package Controllers
 */

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use OutOfOffice\User\Handlers\RegisterUserCommand;
use OutOfOffice\User\Handlers\LoginUserCommand;

/**
 * Class AccountController
 *
 * Manager user login/authentication
 *
 * @package OutOfOffice\User\Controllers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class AccountController extends \BaseController
{
    /**
     * Get method to show login form
     *
     * @return mixed
     * @TODO Add Facebook login ability????
     */
    public function login()
    {
        return View::make('user::account.login');
    }

    /**
     * Post method to authenticate login
     *
     * @return mixed
     */
    public function auth()
    {
        $this->execute(LoginUserCommand::class);
        return Redirect::route('status.manage.index');
    }

    /**
     * Log user out of application
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    /**
     * Sign up user
     *
     * @return mixed
     */
    public function signup()
    {
        return View::make('user::account.signup');
    }

    /**
     * Take form from create method and store to database
     *
     * @return mixed
     */
    public function store()
    {
        $user = $this->execute(RegisterUserCommand::class);
        Flash::success('Be on the look out for an email confirmation. You will be able to login once you confirm your email address.');
        return Redirect::route('user.account.login');
    }

    public function confirm()
    {

    }

}
