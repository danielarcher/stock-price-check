<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use ThreePriceChecker\Application\GetPriceHandler;

class GetPriceController extends Controller
{
    /**
     * @var GetPriceHandler
     */
    private GetPriceHandler $handler;

    public function __construct(GetPriceHandler $handler)
    {
        $this->handler = $handler;
    }

    public function check(string $symbol): JsonResponse
    {
        return $this->handler->handle($symbol);
    }
}
