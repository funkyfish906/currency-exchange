<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CurrencyExchangeRate
 *
 * @package App\Models
 */
class CurrencyExchangeRate extends Model
{
    /**
     * @var string
     */
    protected $table = 'currency_exchange_rates';

    /**
     * @var array
     */
    protected $fillable = [
        'base_currency_code',
        'secondary_currency_code',
        'rate',
        'prev_rate',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'base_currency_code' => 'string',
        'secondary_currency_code' => 'string',
        'rate' => 'float',
        'prev_rate' => 'float',
    ];
}
