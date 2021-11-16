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
     * AlphaVantageStockQuoteService constructor.
     *
     * @param AlphaVantageStockQuoteTranslator $translator
     * @param Client                           $client
     */
    public function __construct(AlphaVantageStockQuoteTranslator $translator, Client $client)
    {
        $this->translator = $translator;
        $this->client     = $client;
    }

    /**
     * @param string $symbol
     *
     * @return StockQuote
     */
    public function get(string $symbol): StockQuote
    {
        try {
            $url  = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey=0O18XUJW9P8QVGQJ";
            $body = $this->client->request('GET', $url)->getBody();

            return $this->translator->translate(json_decode($body, true));
        } catch (BadResponseException $exception) {
            throw new StockQuoteNotFound($symbol, $exception);
        } catch (GuzzleException | CouldNotTranslateResponseException $exception) {
            throw new StockQuoteServiceNotFunctional($exception);
        }
    }
}
