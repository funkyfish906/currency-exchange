<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

/**
 * Class OpenExchangeRatesService
 *
 * @package App\Services
 */
class OpenExchangeRatesService
{
    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $appId;

    /**
     * OpenExchangeRatesService constructor.
     */
    public function __construct()
    {
        $this->baseUrl = 'https://openexchangerates.org/api';
        $this->appId = Config::get('services.openexchangerates.app_id');
    }

    /**
     * @return array|null
     */
    public function getLatestRates(): ?array
    {
        $response = Http::get("{$this->baseUrl}/latest.json?app_id={$this->appId}");

        if ($response->status() !== 200) {
            return null;
        }

        $result = json_decode($response->body(), true);

        return [
            'base' => $result['base'],
            'rates' => $result['rates'],
        ];
    }
}
