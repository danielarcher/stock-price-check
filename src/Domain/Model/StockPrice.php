<?php

namespace ThreePriceChecker\Domain\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StockPrice
 *
 * @property string symbol
 * @property string high
 * @property string low
 * @property string price
 * @package ThreePriceChecker\Domain
 * @method static create(array $array)
 * @method static firstOrCreate(string[] $array)
 * @method static find(string $symbol)
 */
class StockPrice extends Model
{
    protected $table = 'stock_price';

    protected $fillable = [
        'symbol',
        'high',
        'low',
        'price',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}
