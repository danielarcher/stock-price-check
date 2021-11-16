<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
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
        try {
            $dto = $this->handler->handle($symbol);
            return response()->json($dto->toArray(), Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
    }
}
