<?php

namespace ThreePriceChecker\Domain;

class StockPrice
{
    private $symbol;

    private $high;

    private $low;

    private $price;

    public function __construct(string $symbol, string $high, string $low, string $price)
    {
        $this->symbol = $symbol;
        $this->high   = $high;
        $this->low    = $low;
        $this->price  = $price;
    }

    /**
     * @return string
     */
    public function symbol()
    {
        return $this->symbol;
    }

    /**
     * @return string
     */
    public function high()
    {
        return $this->high;
    }

    /**
     * @return string
     */
    public function low()
    {
        return $this->low;
    }

    /**
     * @return string
     */
    public function price()
    {
        return $this->price;
    }
}
