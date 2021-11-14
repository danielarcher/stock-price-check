<?php

namespace ThreePriceChecker\Infrastructure\Domain;

use ThreePriceChecker\Domain\StockQuote;
use ThreePriceChecker\Domain\StockQuoteService;

class AlphaVantageStockQuoteService implements StockQuoteService
{
    /**
     * @var AlphaVantageStockQuoteTranslator
     */
    private AlphaVantageStockQuoteTranslator $translator;

    public function __construct(AlphaVantageStockQuoteTranslator $translator)
    {
        $this->translator = $translator;
    }

    public function get(string $symbol): StockQuote
    {
        $response = json_decode('{
            "Global Quote": {
                "01. symbol": "AMZN",
                "02. open": "3485.0000",
                "03. high": "'.mt_rand().'",
                "04. low": "'.mt_rand().'",
                "05. price": "'.mt_rand().'",
                "06. volume": "2636157",
                "07. latest trading day": "2021-11-12",
                "08. previous close": "3472.5000",
                "09. change": "52.6500",
                "10. change percent": "1.5162%"
            }
        }', true);
        return $this->translator->translate($response);
    }
}
