<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'code' => 'USD',
                'name' => 'US Dollar',
                'symbol' => '$',
                'decimal_places' => 2,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'code' => 'EUR',
                'name' => 'Euro',
                'symbol' => '€',
                'decimal_places' => 2,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'code' => 'PEN',
                'name' => 'Nuevo Sol',
                'symbol' => 'S/',
                'decimal_places' => 2,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'code' => 'GBP',
                'name' => 'British Pound',
                'symbol' => '£',
                'decimal_places' => 2,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'code' => 'JPY',
                'name' => 'Japanese Yen',
                'symbol' => '¥',
                'decimal_places' => 0,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'code' => 'CAD',
                'name' => 'Canadian Dollar',
                'symbol' => 'C$',
                'decimal_places' => 2,
                'is_active' => true,
                'order' => 6,
            ],
            [
                'code' => 'AUD',
                'name' => 'Australian Dollar',
                'symbol' => 'A$',
                'decimal_places' => 2,
                'is_active' => true,
                'order' => 7,
            ],
            [
                'code' => 'CHF',
                'name' => 'Swiss Franc',
                'symbol' => 'Fr',
                'decimal_places' => 2,
                'is_active' => true,
                'order' => 8,
            ],
            [
                'code' => 'CNY',
                'name' => 'Chinese Yuan',
                'symbol' => '¥',
                'decimal_places' => 2,
                'is_active' => true,
                'order' => 9,
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::query()->updateOrCreate(
                ['code' => $currency['code']],
                $currency
            );
        }
    }
}
