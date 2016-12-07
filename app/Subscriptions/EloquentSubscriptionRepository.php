<?php
namespace App\Subscriptions;

class EloquentSubscriptionRepository implements SubscriptionRepository
{
    /**
     * @var \App\Subscriptions\EloquentSubscription
     */
    private $subscription;

    public function __construct(EloquentSubscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @param int $id
     * @return \App\Subscriptions\Subscription|null
     */
    public function find($id)
    {
        return $this->subscription
            ->where('id', $id)
            ->first();
    }
}
