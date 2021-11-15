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
}
