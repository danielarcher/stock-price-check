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
    private string $baseUrl;

    /**
     * AlphaVantageAdapter constructor.
     */
    public function __construct()
    {
        $key = config('services.alpha_vantage.key');
        $host = config('services.alpha_vantage.host');
        $function = config('services.alpha_vantage.function');

        $this->baseUrl = "{$host}/query?function={$function}&apikey={$key}";
    }

    /**
     * @param $symbol
     *
     * @return string
     */
    public function queryUrl($symbol): string
    {
        return $this->baseUrl . "&symbol=" . $symbol;
    }
}
