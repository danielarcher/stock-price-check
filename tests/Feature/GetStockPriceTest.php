<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetStockPriceTest extends TestCase
{
    const TEST_STOCK = 'AMZN';

    public function test_should_return_ok_when_check_stock()
    {
        $response = $this->get('/api/check-stock/' . self::TEST_STOCK);

        $response->assertStatus(200);
    }

    public function test_should_return_not_found_when_incorrect_stock()
    {
        $response = $this->get('/api/check-stock/XXXX');

        $response->assertStatus(404);
    }

    public function test_should_return_correct_data_structure()
    {
        $response = $this->get('/api/check-stock/' . self::TEST_STOCK);

        self::assertEquals(['symbol','high','low','price'],array_keys($response->json()));
    }
}
