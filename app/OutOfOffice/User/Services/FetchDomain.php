<?php namespace OutOfOffice\User\Services;

use Laracasts\Commander\CommandBus;
use OutOfOffice\User\Contracts\DomainValidator;

/**
 * Class FetchDomain
 *
 * Add the users domain to the command object
 *
 * @package OutOfOffice\User\Services
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class FetchDomain implements CommandBus
{
    /**
     * @var DomainValidator $domainValidator
     */
    private $domainValidator;

    /**
     * @param DomainValidator $domainValidator
     */
    public function __construct(DomainValidator $domainValidator)
    {
        $this->domainValidator = $domainValidator;
    }

    /**
     * Validate the email domain and set back to the command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        if (!$command->domain) {
            $command->domain = $this->domainValidator->parseDomainFromEmail($command->email);

            $this->domainValidator->validateDomainIsAllowed($command->domain);
        }

        return $command;
    }
}
