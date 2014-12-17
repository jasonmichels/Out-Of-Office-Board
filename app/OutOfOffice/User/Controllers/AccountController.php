<?php namespace OutOfOffice\User\Controllers;

/**
 * Manager user login/authentication
 *
 * @package Controllers
 */

use OutOfOffice\User\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use OutOfOffice\User\Handlers\RegisterUserCommand;

/**
 * Manager user login/authentication
 *
 * Class AccountController
 * @package Controllers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class AccountController extends \BaseController
{

    /**
     * Dependency inject user repository
     *
     * @param UserRepositoryInterface $users
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Get method to show login form
     *
     * @return mixed
     * @todo Add Facebook login ability????
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
        if (Auth::attempt(
            array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
            ),
            true
        ))
        {
            return Redirect::route('status.manage.index');
        } else {
            Input::flash();
            return Redirect::to('/login')->withInput()->with('login_errors', true);
        }
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
        $this->execute(RegisterUserCommand::class);
        dd('If we get here its done');
//        $validator = $this->users->isValid(Input::all());
//
//        if ($validator->fails()) {
//            return Redirect::route('user.account.signup')->withErrors($validator)->withInput(Input::except('password'));
//        }
//
//        $user = $this->users->createUser(Input::all());
//        Auth::login($user);
//
//        Session::flash('flash_message', array('message' => 'Successfully signed up for Out Of Office Board', 'alert' => 'success', 'callout' => 'Thanks!'));
//        return Redirect::route('status.manage.index');
    }

}