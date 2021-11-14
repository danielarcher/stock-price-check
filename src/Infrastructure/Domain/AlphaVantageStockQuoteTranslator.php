<?php

namespace ThreePriceChecker\Infrastructure\Domain;

use ThreePriceChecker\Domain\StockQuote;

class AlphaVantageStockQuoteTranslator
{
    public function translate(array $response): StockQuote
    {
        return new StockQuote(
            $response['Global Quote']['01. symbol'],
            $response['Global Quote']['03. high'],
            $response['Global Quote']['04. low'],
            $response['Global Quote']['05. price'],
        );
    }
}
