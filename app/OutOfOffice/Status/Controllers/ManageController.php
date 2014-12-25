<?php namespace OutOfOffice\Status\Controllers;
/**
 * Manager statuses
 *
 * @package Controllers
 */

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use OutOfOffice\Status\Models\Status;
use OutOfOffice\Status\Handlers\CreateStatusCommand;

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
        // get a list of all statuses for the company today
        return View::make('status::manage.index');
    }

    /**
     * Show a form to create a new status
     *
     * @return mixed
     */
    public function create()
    {
        $statuses = Status::getAllStatuses();
        return View::make('status::manage.create')->with('statuses', $statuses);
    }

    /**
     * Take form from create method and store to database
     *
     * @return mixed
     */
    public function store()
    {
        $this->execute(
            CreateStatusCommand::class,
            null,
            ['OutOfOffice\Status\Services\CreateStatusDateGenerator']
        );
        var_dump('This is the end of the store method');
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