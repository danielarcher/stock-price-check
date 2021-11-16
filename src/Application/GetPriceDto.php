<?php

namespace ThreePriceChecker\Application;

use ThreePriceChecker\Domain\Model\StockPrice;

/**
 * Class GetPriceDto
 *
 * @package ThreePriceChecker\Application
 */
class GetPriceDto
{
    /**
     * @var string
     */
    private string $symbol;
    /**
     * @var string
     */
    private string $high;
    /**
     * @var string
     */
    private string $low;
    /**
     * @var string
     */
    private string $price;

    /**
     * GetPriceDto constructor.
     *
     * @param string $symbol
     * @param string $high
     * @param string $low
     * @param string $price
     */
    public function __construct(string $symbol, string $high, string $low, string $price)
    {
        $this->symbol = $symbol;
        $this->high = $high;
        $this->low = $low;
        $this->price = $price;
    }

    /**
     * @param StockPrice $stockPrice
     *
     * @return static
     */
    public static function fromStockPrice(StockPrice $stockPrice): self
    {
        return new self($stockPrice->symbol, $stockPrice->high, $stockPrice->low, $stockPrice->price);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }
}
