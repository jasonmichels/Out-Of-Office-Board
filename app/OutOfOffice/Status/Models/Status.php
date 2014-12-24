<?php namespace OutOfOffice\Status\Models;

use Laracasts\Commander\Events\EventGenerator;

/**
 * Class Status
 *
 * Status eloquent model
 *
 * @package OutOfOffice\Status\Models
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class Status extends \Eloquent
{
    use EventGenerator;

    protected $fillable = array('user_id', 'type', 'start_date', 'end_date');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';

    /**
     * Define the relationship between statuses and users
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('OutOfOffice\User\User');
    }

}
