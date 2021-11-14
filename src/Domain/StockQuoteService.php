<?php

namespace ThreePriceChecker\Domain;

use ThreePriceChecker\Domain\Exception\StockQuoteNotFound;

interface StockQuoteService
{
    /**
     * @throws StockQuoteNotFound
     */
    public function get(string $symbol): StockQuote;
}
