<?php namespace OutOfOffice\User\Controllers;
/**
 * Manager users account
 *
 * @package Controllers
 */

use OutOfOffice\User\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

/**
 * Manager users account
 *
 * Class ManageController
 * @package Controllers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class ManageController extends \BaseController
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
     * Should show list of all users
     *
     * @return mixed
     */
    public function index()
    {
        $users = $this->users->paginate(20);
        return View::make('user::manage.index')->with('users', $users);
    }

    /**
     * Show a form to create a new user
     *
     * @return mixed
     */
    public function create()
    {
        return View::make('user::manage.create');
    }

    /**
     * Take form from create method and store to database
     *
     * @return mixed
     */
    public function store()
    {
        $validator = $this->users->isValid(Input::all());

        if ($validator->fails()) {
            return Redirect::route('user.manage.create')->withErrors($validator)->withInput(Input::except('password'));
        }

        $user = $this->users->createUser(Input::all());

        Session::flash('flash_message', array('message' => 'Successfully created the user: ' . $user->username, 'alert' => 'success', 'callout' => 'Congratulations!'));
        return Redirect::route('user.manage.index');
    }

    /**
     * Show a specific user
     *
     * @param int $id
     * @return mixed
     */
    public function show($id)
    {
        $user = $this->users->findOrFail($id);

        return View::make('user::manage.show')->with('user', $user);
    }

    /**
     * Show edit form for specific user
     *
     * @param int $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = $this->users->findOrFail($id);

        return View::make('user::manage.edit')->with('user', $user);
    }

    /**
     * Update specific user
     *
     * @param int $id
     * @return mixed
     */
    public function update($id)
    {
        $user = $this->users->findOrFail($id);

        $validator = $this->users->isValid(Input::all(), $user->id);

        if ($validator->fails()) {
            return Redirect::route('user.manage.edit', array('id' => $user->id))->withErrors($validator)->withInput(Input::except('password'));
        }

        $user = $this->users->update($user, Input::all());

        Session::flash('flash_message', array('message' => 'Successfully updated user: ' . $user->username, 'alert' => 'success', 'callout' => 'Congratulations!'));
        return Redirect::route('user.manage.show', array('id' => $user->id));
    }

    /**
     * Delete a specific user
     *
     * @param int $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = $this->users->findOrFail($id);
        $user->delete();

        // redirect to index action
        Session::flash('flash_message', array('message' => 'Successfully deleted user: ' . $user->username, 'alert' => 'danger', 'callout' => 'Deleted!'));
        return Redirect::route('user.manage.index');
    }

}