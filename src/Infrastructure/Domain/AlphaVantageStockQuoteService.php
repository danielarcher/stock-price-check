<?php

namespace ThreePriceChecker\Infrastructure\Domain;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
use ThreePriceChecker\Domain\Exception\StockQuoteNotFound;
use ThreePriceChecker\Domain\Exception\StockQuoteServiceNotFunctional;
use ThreePriceChecker\Domain\StockQuote;
use ThreePriceChecker\Domain\StockQuoteService;
use ThreePriceChecker\Infrastructure\Exception\CouldNotTranslateResponseException;
use ThreePriceChecker\Infrastructure\Exception\RequestLimitReachedException;

/**
 * Class AlphaVantageStockQuoteService
 *
 * @package ThreePriceChecker\Infrastructure\Domain
 */
class AlphaVantageStockQuoteService implements StockQuoteService
{
    /**
     * @var AlphaVantageStockQuoteTranslator
     */
    private AlphaVantageStockQuoteTranslator $translator;
    /**
     * @var AlphaVantageAdapter
     */
    private AlphaVantageAdapter $adapter;

    /**
     * AlphaVantageStockQuoteService constructor.
     *
     * @param AlphaVantageStockQuoteTranslator $translator
     */
    public function __construct(AlphaVantageStockQuoteTranslator $translator, AlphaVantageAdapter $adapter)
    {
        $this->translator = $translator;
        $this->adapter = $adapter;
    }

    /**
     * @param string $symbol
     *
     * @return StockQuote
     * @throws StockQuoteNotFound
     * @throws StockQuoteServiceNotFunctional
     */
    public function get(string $symbol): StockQuote
    {
        try {
            $body = Http::get($this->adapter->queryUrl($symbol))->body();

            return $this->translator->translate(json_decode($body, true));
        } catch (RequestLimitReachedException | BadResponseException $exception) {
            throw new StockQuoteNotFound($symbol, $exception);
        } catch (GuzzleException | CouldNotTranslateResponseException $exception) {
            throw new StockQuoteServiceNotFunctional($exception);
        }
    }
}
