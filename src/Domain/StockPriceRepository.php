<?php

namespace ThreePriceChecker\Domain;

use ThreePriceChecker\Domain\Model\StockPrice;

class StockPriceRepository
{
    public function save(array $data): StockPrice
    {
        $object = StockPrice::create([
            'symbol' => $data['symbol'],
            'high' => $data['high'],
            'low' => $data['low'],
            'price' => $data['price'],
        ]);
        $object->save();

        return $object;
    }

    public function saveFromStockQuote(StockQuote $quote): StockPrice
    {
        $object = StockPrice::create([
            'symbol' => $quote->symbol(),
            'high' => $quote->high(),
            'low' => $quote->low(),
            'price' => $quote->price(),
        ]);
        $object->save();

        return $object;
    }
}
