<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetStockPriceTest extends TestCase
{
    const TEST_STOCK = 'AMZN';

    public function test_should_return_ok_when_check_stock()
    {
        Http::fake([config('services.alpha_vantage.host').'/*' => Http::response($this->defaultResponseBody())]);

        $response = $this->get('/api/check-stock/' . self::TEST_STOCK);

        $response->assertStatus(200);
    }

    public function test_should_return_not_found_when_incorrect_stock()
    {
        Http::fake([config('services.alpha_vantage.host').'/*' => Http::response([],404)]);

        $response = $this->get('/api/check-stock/XXXX');

        $response->assertStatus(404);
    }

    public function test_should_return_not_found_when_reach_max_request()
    {
        Http::fake([config('services.alpha_vantage.host').'/*' => Http::response(['Note' => 'max requests reached'])]);

        $response = $this->get('/api/check-stock/XXXX');

        $response->assertStatus(404);
    }

    public function test_should_return_correct_data_structure()
    {
        Http::fake([config('services.alpha_vantage.host').'/*' => Http::response($this->defaultResponseBody())]);

        $response = $this->get('/api/check-stock/' . self::TEST_STOCK);

        self::assertEquals(['symbol','high','low','price'],array_keys($response->json()));
    }

    public function defaultResponseBody(): array
    {
        return [
            'Global Quote' => [
                '01. symbol'             => 'AMZN',
                '02. open'               => '3539.0000',
                '03. high'               => '3576.5000',
                '04. low'                => '3525.1466',
                '05. price'              => '3540.7000',
                '06. volume'             => '2198819',
                '07. latest trading day' => '2021-11-16',
                '08. previous close'     => '3545.6800',
                '09. change'             => '-4.9800',
                '10. change percent'     => '-0.1405%',
            ],
        ];
    }
}
