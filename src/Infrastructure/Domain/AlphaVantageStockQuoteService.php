<?php

namespace ThreePriceChecker\Infrastructure\Domain;

use ThreePriceChecker\Domain\StockPrice;
use ThreePriceChecker\Domain\StockQuoteService;

class AlphaVantageStockQuoteService implements StockQuoteService
{
    public function get(string $symbol): StockPrice
    {

    }
}
