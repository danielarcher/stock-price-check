<?php

use App\Http\Controllers\GetPriceController;
use App\Http\Controllers\SuperSimpleGetPriceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/check-stock/{symbol}', [GetPriceController::class, "check"]);
Route::get('/check-stock-simple/{symbol}', [SuperSimpleGetPriceController::class, "check"]);
