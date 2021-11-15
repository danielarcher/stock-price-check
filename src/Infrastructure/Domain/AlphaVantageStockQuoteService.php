<?php

namespace ThreePriceChecker\Infrastructure\Domain;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use ThreePriceChecker\Domain\StockQuote;
use ThreePriceChecker\Domain\StockQuoteService;

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

    public function __construct(AlphaVantageStockQuoteTranslator $translator, Client $client)
    {
        $this->translator = $translator;
        $this->client = $client;
    }

    public function get(string $symbol): StockQuote
    {
        $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey=0O18XUJW9P8QVGQJ";
        $body = $this->client->request('GET', $url)->getBody();
        
        return $this->translator->translate(json_decode($body,true));
    }
}
