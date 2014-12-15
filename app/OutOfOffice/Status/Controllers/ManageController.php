<?php namespace OutOfOffice\Status\Controllers;
/**
 * Manager statuses
 *
 * @package Controllers
 */

use Illuminate\Support\Facades\View;

/**
 * Manager statuses
 *
 * Class ManageController
 * @package Controllers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class ManageController extends \BaseController
{

    /**
     * Should show list of all statuses
     *
     * @return mixed
     */
    public function index()
    {
        return View::make('status::manage.index');
    }

    /**
     * Show a form to create a new status
     *
     * @return mixed
     */
    public function create()
    {
        return View::make('status::manage.create');
    }

    /**
     * Take form from create method and store to database
     *
     * @return mixed
     */
    public function store()
    {
    }

    /**
     * Show a specific status
     *
     * @param int $id
     * @return mixed
     */
    public function show($id)
    {
    }

    /**
     * Show edit form for specific status
     *
     * @param int $id
     * @return mixed
     */
    public function edit($id)
    {
    }

    /**
     * Update specific status
     *
     * @param int $id
     * @return mixed
     */
    public function update($id)
    {
    }

    /**
     * Delete a specific status
     *
     * @param int $id
     * @return mixed
     */
    public function destroy($id)
    {
    }

}