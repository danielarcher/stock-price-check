<?php

namespace ThreePriceChecker\Infrastructure\Exception;

use Exception;

class RequestLimitReachedException extends Exception
{
    public function __construct()
    {
        parent::__construct("Request Limit reached, try again in a few minutes.", 0);
    }
}
