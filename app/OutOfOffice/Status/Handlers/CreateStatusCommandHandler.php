<?php namespace OutOfOffice\Status\Handlers;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class CreateStatusCommandHandler implements CommandHandler
{
    use DispatchableTrait;

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        var_dump($command);
    }
}