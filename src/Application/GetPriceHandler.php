<?php

namespace ThreePriceChecker\Application;

use ThreePriceChecker\Domain\Exception\StockQuoteNotFound;
use ThreePriceChecker\Domain\StockPriceRepository;
use ThreePriceChecker\Domain\StockQuoteService;

/**
 * Class GetPriceHandler
 *
 * @package ThreePriceChecker\Application
 */
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

    /**
     * GetPriceHandler constructor.
     *
     * @param StockPriceRepository $repository
     * @param StockQuoteService    $service
     */
    public function __construct(StockPriceRepository $repository, StockQuoteService $service)
    {
        $this->repository = $repository;
        $this->service    = $service;
    }

    /**
     * @param string $symbol
     *
     * @return GetPriceDto
     * @throws StockQuoteNotFound
     */
    public function handle(string $symbol): GetPriceDto
    {
        $stockPrice = $this->repository->saveFromStockQuote($this->service->get($symbol));
        return GetPriceDto::fromStockPrice($stockPrice);
    }
}
