<?php namespace OutOfOffice\User\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;

/**
 * Class RemindersController
 * @package OutOfOffice\User\Controllers
 */
class RemindersController extends \BaseController {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('user::password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email')))
		{
			case Password::INVALID_USER:
                Flash::error(Lang::get($response));
				return Redirect::back()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
                Flash::success(Lang::get($response));
				return Redirect::back()->with('status', Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('user::password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
                Flash::error(Lang::get($response));
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
                Flash::success('Your password has been reset. Please login again');
				return Redirect::to('/');
		}
	}

}