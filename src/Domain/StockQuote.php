<?php

namespace ThreePriceChecker\Domain;

class StockQuote
{
    private string $symbol;
    private string $high;
    private string $low;
    private string $price;

    public function __construct(string $symbol, string $high, string $low, string $price)
    {
        $this->symbol = $symbol;
        $this->high = $high;
        $this->low = $low;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function symbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return string
     */
    public function high(): string
    {
        return $this->high;
    }

    /**
     * @return string
     */
    public function low(): string
    {
        return $this->low;
    }

    /**
     * @return string
     */
    public function price(): string
    {
        return $this->price;
    }

    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }
}
