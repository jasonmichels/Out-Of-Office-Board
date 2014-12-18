<?php namespace OutOfOffice\User\Contracts;

/**
 * Interface DomainValidator
 * @package OutOfOffice\User\Contracts
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
interface DomainValidator
{
    /**
     * Check if a domain is allowed
     *
     * @param $domain
     *
     * @return bool
     */
    public function isAllowed($domain);

    /**
     * Validate a domain is allowed to be used
     *
     * @param $domain
     *
     * @throws \Exception
     */
    public function validateDomainIsAllowed($domain);

    /**
     * Parse the domain from an email address
     *
     * @param $email
     *
     * @return mixed
     */
    public function parseDomainFromEmail($email);
} 