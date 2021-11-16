<?php

namespace ThreePriceChecker\Infrastructure\Exception;

use Exception;
use Throwable;

class CouldNotTranslateResponseException extends Exception
{
    public function __construct($response = "", Throwable $previous = null)
    {
        parent::__construct("Could not translate received message: ".json_encode($response), 0, $previous);
    }
}
