<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Create default accounts for each user
            $this->createDefaultAccounts($user);
        }
    }

    /**
     * Create default accounts for a user.
     */
    private function createDefaultAccounts(User $user): void
    {
        // Get currency IDs
        $usdCurrency = Currency::query()->where('code', 'USD')->first();

        if (!$usdCurrency) {
            // If the USD currency doesn't exist, create it
            $usdCurrency = Currency::query()->create([
                'code' => 'USD',
                'name' => 'US Dollar',
                'symbol' => '$',
                'decimal_places' => 2,
                'is_active' => true,
            ]);
        }

        $accounts = [
            [
                'name' => 'Cash',
                'type' => 'cash',
                'balance' => 500.00,
                'currency_id' => $usdCurrency->id,
                'description' => 'Cash on hand',
                'order' => 1,
            ],
            [
                'name' => 'Checking Account',
                'type' => 'checking',
                'balance' => 2500.75,
                'currency_id' => $usdCurrency->id,
                'description' => 'Primary checking account',
                'order' => 2,
            ],
            [
                'name' => 'Savings Account',
                'type' => 'savings',
                'balance' => 10000.00,
                'currency_id' => $usdCurrency->id,
                'description' => 'Emergency fund and savings',
                'order' => 3,
            ],
            [
                'name' => 'Credit Card',
                'type' => 'credit_card',
                'balance' => -750.50,
                'currency_id' => $usdCurrency->id,
                'description' => 'Primary credit card',
                'order' => 4,
            ],
        ];

        foreach ($accounts as $accountData) {
            $account = new Account([
                'name' => $accountData['name'],
                'type' => $accountData['type'],
                'currency_id' => $accountData['currency_id'],
                'description' => $accountData['description'],
                'user_id' => $user->id,
                'order' => $accountData['order'],
            ]);

            // Set the initial balance and save
            $account->setInitialBalance($accountData['balance'])->save();
        }
    }
}
