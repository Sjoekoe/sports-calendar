<?php
namespace App\Accounts\Subscriptions;

use App\Accounts\Account;
use App\Accounts\AccountRepository;
use App\Plans\Plan;
use Stripe\Customer;

class AccountSubscription
{
    /**
     * @var \App\Accounts\Account
     */
    private $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
        $this->accountRepository = app(AccountRepository::class);
    }

    /**
     * @param \App\Plans\Plan $plan
     * @param string $token
     * @return \App\Accounts\Account
     */
    public function create(Plan $plan, $token)
    {
        $customer = Customer::create([
            'email' => $this->account->email(),
            'source' => $token,
            'plan' => $plan->name()
        ]);

        $this->accountRepository->subscribe($this->account, [
            'stripe_id' => $customer->id,
            'stripe_active' => true
        ]);

        return $this->account;
    }
}
