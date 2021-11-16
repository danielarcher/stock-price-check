<?php

namespace Tests\Unit;

use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;
use ThreePriceChecker\Domain\Model\StockPrice;
use ThreePriceChecker\Domain\StockPriceRepository;
use ThreePriceChecker\Domain\StockQuote;

class StockPriceRepositoryTest extends TestCase
{
    /**
     * @var Generator
     */
    private Generator $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }

    public function test_should_create_successful_stock_price_from_array()
    {
        $repository = new StockPriceRepository();
        $price = $repository->save([
            'symbol' => $this->faker->word,
            'high' => $this->faker->shuffleString,
            'low' => $this->faker->shuffleString,
            'price' => $this->faker->shuffleString,
        ]);

        self::assertInstanceOf(StockPrice::class, $price);
    }

    public function test_should_create_successful_stock_price_from_stock_quote()
    {
        $repository = new StockPriceRepository();
        $quote = new StockQuote($this->faker->word, $this->faker->shuffleString, $this->faker->shuffleString, $this->faker->shuffleString);

        self::assertInstanceOf(StockPrice::class, $repository->saveFromStockQuote($quote));
    }
}
