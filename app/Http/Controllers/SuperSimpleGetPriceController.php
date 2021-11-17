<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use ThreePriceChecker\Domain\Model\StockPrice;

class SuperSimpleGetPriceController extends Controller
{
    /**
     * @var Client
     */
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function check(string $symbol): JsonResponse
    {
        try {
            $data   = $this->requestStockPrice($symbol);
            $object = $this->saveStockPrice($data);

            return response()->json($object->toArray(), Response::HTTP_OK);
        } catch (GuzzleException $e) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param string $symbol
     *
     * @return mixed
     */
    public function requestStockPrice(string $symbol): array
    {
        $key = config('services.alpha_vantage.key');
        $host = config('services.alpha_vantage.host');
        $function = config('services.alpha_vantage.function');

        $url = "{$host}/query?function={$function}&apikey={$key}&symbol={$symbol}";
        $body = Http::get($url)->body();

        return json_decode($body, true);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function saveStockPrice(array $data)
    {
        $object = StockPrice::create([
            'symbol' => $data['Global Quote']['01. symbol'],
            'high'   => $data['Global Quote']['03. high'],
            'low'    => $data['Global Quote']['04. low'],
            'price'  => $data['Global Quote']['05. price'],
        ]);
        $object->save();

        return $object;
    }
}
