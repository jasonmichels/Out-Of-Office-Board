<?php namespace OutOfOffice\User\Services;

use OutOfOffice\User\Contracts\DomainValidator;

/**
 * Class ArrayDomainValidator
 *
 * @package OutOfOffice\User\Services
 * @author Jason Michels <jason@jasonmichels.com>
 * @version $Id$
 */
class ArrayDomainValidator implements DomainValidator
{
    /**
     * @var array
     */
    private $disallowedDomains = [
        "hotmail.com",
        "gmail.com",
        "icloud.com",
        "me.com",
        "yahoo.com",
        "aol.com",
        "mail.com",
    ];

    /**
     * Check if a domain is allowed
     *
     * @param $domain
     *
     * @return bool
     */
    public function isAllowed($domain)
    {
        return !in_array($domain, $this->disallowedDomains) ? true : false;
    }

    /**
     * Validate a domain is allowed to be used
     *
     * @param $domain
     *
     * @throws \Exception
     */
    public function validateDomainIsAllowed($domain)
    {
        if (!$this->isAllowed($domain)) {
            throw new \Exception('This email is not allowed to be used. If you believe this is a mistake, please contact us');
        }
    }

    /**
     * Parse the domain from an email address
     *
     * @param $email
     *
     * @return mixed
     */
    public function parseDomainFromEmail($email)
    {
        $emailExploded = explode('@', $email);
        return array_pop($emailExploded);
    }
} 