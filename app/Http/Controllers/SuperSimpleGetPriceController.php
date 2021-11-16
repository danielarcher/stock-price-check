<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use ThreePriceChecker\Domain\Model\StockPrice;

class SuperSimpleGetPriceController extends Controller
{
    const API_KEY = "0O18XUJW9P8QVGQJ";
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
     * @throws GuzzleException
     */
    public function requestStockPrice(string $symbol): array
    {
        $key  = self::API_KEY;
        $url  = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$key}";
        $body = $this->client->request('GET', $url)->getBody();

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
