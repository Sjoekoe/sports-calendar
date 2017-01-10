<?php
namespace App\Http\Controllers;

use App\Accounts\AccountRepository;
use App\Accounts\Requests\SubscriptionRequest;
use App\Accounts\Subscriptions\SubscriptionHandler;
use App\Plans\Plan;
use Exception;

class SubscriptionController extends Controller
{
    /**
     * @var \App\Accounts\AccountRepository
     */
    private $accounts;

    /**
     * @var \App\Accounts\Subscriptions\SubscriptionHandler
     */
    private $subscriptionHandler;

    public function __construct(AccountRepository $accounts, SubscriptionHandler $subscriptionHandler)
    {
        $this->accounts = $accounts;
        $this->subscriptionHandler = $subscriptionHandler;
    }

    public function store(SubscriptionRequest $request, Plan $plan)
    {
        try {
            $this->subscriptionHandler->handle($plan, $request->all());
        } catch (Exception $e) {
            return response()->json(['status' => $e->getMessage()], 422);
        }

        return [
            'status' => 'Success',
        ];
    }
}
