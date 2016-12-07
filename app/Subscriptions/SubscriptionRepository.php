<?php
namespace App\Subscriptions;

interface SubscriptionRepository
{
    /**
     * @param int $id
     * @return \App\Subscriptions\Subscription|null
     */
    public function find($id);
}
