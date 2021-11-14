<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ThreePriceChecker\Application\GetPriceHandler;
use ThreePriceChecker\Domain\StockQuoteService;
use ThreePriceChecker\Infrastructure\Domain\AlphaVantageStockQuoteService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app
            ->when(GetPriceHandler::class)
            ->needs(StockQuoteService::class)
            ->give(AlphaVantageStockQuoteService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
