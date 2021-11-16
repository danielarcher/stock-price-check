<?php

namespace ThreePriceChecker\Infrastructure\Domain;

use ThreePriceChecker\Domain\StockQuote;
use ThreePriceChecker\Infrastructure\Exception\CouldNotTranslateResponseException;
use ThreePriceChecker\Infrastructure\Exception\RequestLimitReachedException;
use Throwable;
use function PHPUnit\Framework\arrayHasKey;

/**
 * Class AlphaVantageStockQuoteTranslator
 *
 * @package ThreePriceChecker\Infrastructure\Domain
 */
class AlphaVantageStockQuoteTranslator
{
    /**
     * @param array $response
     *
     * @return StockQuote
     * @throws CouldNotTranslateResponseException
     * @throws RequestLimitReachedException
     */
    public function translate(array $response): StockQuote
    {
        if (array_key_exists('Note', $response)) {
            throw new RequestLimitReachedException();
        }

        try {
            return new StockQuote(
                $response['Global Quote']['01. symbol'],
                $response['Global Quote']['03. high'],
                $response['Global Quote']['04. low'],
                $response['Global Quote']['05. price'],
            );
        } catch (Throwable $exception) {
            throw new CouldNotTranslateResponseException($response);
        }
    }
}
