<?php

namespace ThreePriceChecker\Infrastructure\Domain;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
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
     * @var Client
     */
    private Client $client;
    /**
     * @var AlphaVantageAdapter
     */
    private AlphaVantageAdapter $adapter;

    /**
     * AlphaVantageStockQuoteService constructor.
     *
     * @param AlphaVantageStockQuoteTranslator $translator
     * @param Client                           $client
     */
    public function __construct(AlphaVantageStockQuoteTranslator $translator, Client $client, AlphaVantageAdapter $adapter)
    {
        $this->translator = $translator;
        $this->client = $client;
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
            $body = $this->client->request('GET', $this->adapter->queryUrl($symbol))->getBody();

            return $this->translator->translate(json_decode($body, true));
        } catch (RequestLimitReachedException | BadResponseException $exception) {
            throw new StockQuoteNotFound($symbol, $exception);
        } catch (GuzzleException | CouldNotTranslateResponseException $exception) {
            throw new StockQuoteServiceNotFunctional($exception);
        }
    }
}
