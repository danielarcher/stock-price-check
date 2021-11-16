<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SuperSimpleGetStockPriceTest extends TestCase
{
    const TEST_STOCK = 'AMZN';

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_should_return_ok_when_check_stock()
    {
        $response = $this->get('/api/check-stock-simple/' . self::TEST_STOCK);

        $response->assertStatus(200);
    }

    public function test_should_return_correct_data_structure()
    {
        $response = $this->get('/api/check-stock-simple/' . self::TEST_STOCK);

        self::assertEquals(['symbol','high','low','price'],array_keys($response->json()));
    }
}
