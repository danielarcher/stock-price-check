<?php

namespace ThreePriceChecker\Domain;

use ThreePriceChecker\Domain\Exception\StockQuoteNotFound;
use ThreePriceChecker\Domain\Exception\StockQuoteServiceNotFunctional;

/**
 * Interface StockQuoteService
 *
 * @package ThreePriceChecker\Domain
 */
interface StockQuoteService
{
    /**
     * @param string $symbol
     *
     * @return StockQuote
     *
     * @throws StockQuoteNotFound
     * @throws StockQuoteServiceNotFunctional
     */
    public function get(string $symbol): StockQuote;
}
