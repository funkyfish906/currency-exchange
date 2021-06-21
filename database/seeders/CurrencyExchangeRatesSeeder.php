<?php

namespace Database\Seeders;

use App\Facades\OpenExchangeRatesFacade;
use App\Models\CurrencyExchangeRate;
use Illuminate\Database\Seeder;

class CurrencyExchangeRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = OpenExchangeRatesFacade::getLatestRates();

        foreach ($rates['rates'] as $key=>$value) {
            CurrencyExchangeRate::query()->create([
                'base_currency_code' => $rates['base'],
                'secondary_currency_code' => $key,
                'rate' => $value,
            ]);
        }
    }
}
