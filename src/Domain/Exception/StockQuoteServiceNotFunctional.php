<?php

namespace ThreePriceChecker\Domain\Exception;

use Throwable;

class StockQuoteServiceNotFunctional extends \Exception
{
    public function __construct(Throwable $previous)
    {
        parent::__construct("Stock Quote Service received an error: ".$previous->getMessage(), 0, $previous);
    }
}
