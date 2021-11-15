<?php

namespace ThreePriceChecker\Application;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use ThreePriceChecker\Domain\Exception\StockQuoteNotFound;
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
        $this->service    = $service;
    }

    /**
     * @param string $symbol
     *
     * @return JsonResponse
     * @throws StockQuoteNotFound
     */
    public function handle(string $symbol): JsonResponse
    {
        $stockPrice = $this->repository->save($this->service->get($symbol)->toArray());
        return response()->json($stockPrice->toArray(), Response::HTTP_OK);
    }
}
