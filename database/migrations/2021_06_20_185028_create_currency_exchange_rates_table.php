<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyExchangeRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->string('base_currency_code', 3)->index();
            $table->string('secondary_currency_code', 3)->index();
            $table->unsignedDouble('rate', 10, 2);
            $table->unsignedDouble('prev_rate', 10, 2)->nullable();
            $table->timestamps();

            $table->unique(
                ['base_currency_code', 'secondary_currency_code'],
                'currencies_unique',
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_exchange_rates');
    }
}
