<?php
namespace App\Accounts\Subscriptions;

use App\Accounts\AccountRepository;
use App\Plans\Plan;

class SubscriptionHandler
{
    /**
     * @var \App\Accounts\AccountRepository
     */
    private $accounts;

    public function __construct(AccountRepository $accounts)
    {
        $this->accounts = $accounts;
    }

    /**
     * @param \App\Plans\Plan $plan
     * @param array $values
     * @return \App\Accounts\Account
     */
    public function handle(Plan $plan, array $values)
    {
        $account = $this->accounts->create([
            'email' => $values['stripeEmail'],
            'name' => 'Test',
        ]);

        $account->subscription()->create($plan, $values['stripeToken']);

        return $account;
    }
}
