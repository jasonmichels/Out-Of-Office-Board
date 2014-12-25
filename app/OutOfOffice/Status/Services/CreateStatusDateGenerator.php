<?php namespace OutOfOffice\Status\Services;

use Laracasts\Commander\CommandBus;

class CreateStatusDateGenerator implements CommandBus
{

    public function execute($command)
    {
        var_dump('This is the create status date generator');
    }
}