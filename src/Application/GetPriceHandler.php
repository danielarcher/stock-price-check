<?php

namespace ThreePriceChecker\Application;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use ThreePriceChecker\Domain\StockPriceRepository;
use ThreePriceChecker\Domain\StockQuoteService;

class GetPriceHandler
{
    /**
     * @var StockPriceRepository
     */
    private StockPriceRepository $repository;
    /**
     * @var StockQuoteService
     */
    private StockQuoteService $service;

    public function __construct(StockPriceRepository $repository, StockQuoteService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function handle(string $symbol): JsonResponse
    {
        return response()->json([
            'symbol' => $symbol,
            'high' => '1234.5678',
            'low' => '1234.5678',
            'price' => '1234.5678',
        ], Response::HTTP_OK); #improvement: create dto object
    }
}
