<?php

namespace ThreePriceChecker\Domain\Exception;

use Throwable;

class StockQuoteNotFound extends \Exception
{
    public function __construct($symbol, Throwable $previous)
    {
        parent::__construct("Stock Quote '{$symbol}' not found", 0, $previous);
    }
}
