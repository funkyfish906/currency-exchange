<?php

namespace App\Http\Controllers;

use App\Models\CurrencyExchangeRate;
use Illuminate\Http\JsonResponse;

class CurrencyExchangeController extends Controller
{
    /**
     * @param string $baseCode
     * @param string $secondaryCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function convert(string $baseCode, string $secondaryCode): JsonResponse
    {
        $rates = CurrencyExchangeRate::query()->where([
            'base_currency_code' => $baseCode,
            'secondary_currency_code' => $secondaryCode,
        ])->firstOrFail();

        return new JsonResponse($rates->rate);
    }
}
