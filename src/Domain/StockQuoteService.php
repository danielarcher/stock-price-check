<?php

namespace ThreePriceChecker\Domain;

interface StockQuoteService
{
    public function get(string $symbol): StockPrice;
}
