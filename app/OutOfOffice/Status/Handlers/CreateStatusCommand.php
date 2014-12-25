<?php namespace OutOfOffice\Status\Handlers;

use OutOfOffice\Support\Contracts\ArrayableInterface;
use OutOfOffice\Support\Traits\ArrayableTrait;
use Carbon\Carbon;

/**
 * Class CreateStatusCommand
 *
 * Create new status command
 *
 * @package OutOfOffice\Status\Handlers
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class CreateStatusCommand implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $start_date;

    /**
     * @var string
     */
    public $start_time;

    /**
     * @var Carbon
     */
    public $startDateTime;

    /**
     * @var string
     */
    public $end_date;

    /**
     * @var string
     */
    public $end_time;

    /**
     * @var Carbon
     */
    public $endDateTime;

    /**
     * @param string $type
     * @param string $start_date
     * @param string $start_time
     * @param string $end_date
     * @param string $end_time
     */
    public function __construct($type, $start_date, $start_time, $end_date, $end_time)
    {
        $this->type = $type;
        $this->start_date = $start_date;
        $this->start_time = $start_time;
        $this->end_date = $end_date;
        $this->end_time = $end_time;
    }
}
