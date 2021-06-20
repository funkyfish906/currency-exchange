<?php

namespace App\Facades;

use App\Services\OpenExchangeRatesService;
use Illuminate\Support\Facades\Facade;

/**
 * Class OpenExchangeRatesFacade
 *
 * @package App\Facades
 */
class OpenExchangeRatesFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return OpenExchangeRatesService::class;
    }
}
