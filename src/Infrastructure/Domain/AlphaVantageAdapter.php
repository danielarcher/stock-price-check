<?php

namespace ThreePriceChecker\Infrastructure\Domain;

/**
 * Class AlphaVantageAdapter
 *
 * @package ThreePriceChecker\Infrastructure\Domain
 */
class AlphaVantageAdapter
{
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $host;
    /**
     * @var string
     */
    private $function;

    /**
     * AlphaVantageAdapter constructor.
     */
    public function __construct()
    {
        $this->key      = config('services.alpha_vantage.key');
        $this->host     = config('services.alpha_vantage.host');
        $this->function = config('services.alpha_vantage.function');
    }

    /**
     * @param $symbol
     *
     * @return string
     */
    public function queryUrl($symbol): string
    {
        return "{$this->host}/query?function={$this->function}&symbol={$symbol}&apikey={$this->key}";
    }
}
