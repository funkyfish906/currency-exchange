<?php

declare(strict_types=1);

namespace App\Console\Commands\CurrencyExchangeRate;

use App\Facades\OpenExchangeRatesFacade;
use App\Models\CurrencyExchangeRate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Class Update
 *
 * @package App\Console\Commands\CurrencyExchangeRate
 */
class Update extends Command
{
    /**
     * @var string
     */
    protected $signature = 'currency-exchange-rates:update';
    /**
     * @return void
     */
    public function handle(): void
    {
        $rates = OpenExchangeRatesFacade::getLatestRates();

        foreach ($rates['rates'] as $key=>$value) {
            try {
                $currentRate = CurrencyExchangeRate::query()->where([
                    'base_currency_code' => $rates['base'],
                    'secondary_currency_code' => $key,
                ]);

                $currentRate->update([
                    'prev_rate' => DB::raw('rate'),
                    'rate' => round($value, 2),
                ]);

            } catch (Throwable $e) {
                Log::error($e->getMessage());
            }
        }
    }
}
