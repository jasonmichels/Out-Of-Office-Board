<?php namespace OutOfOffice\Status\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Class CreateStatusForm
 *
 * Validation rules for creating a new status
 *
 * @package OutOfOffice\Status\Forms
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class CreateStatusForm extends FormValidator
{
    /**
     * Validation rules for creating a new status
     *
     * @var array
     */
    protected $rules = [
        'type'       => array('in:wfh,pto,arrive_late,leave_early'),
        'start_date' => array('required', 'date'),
        'start_time' => array('required'), // @TODO Add regex validation
        'end_date'   => array('required', 'date'),
        'end_time'   => array('required'), // @TODO Add regex validation
    ];

}
