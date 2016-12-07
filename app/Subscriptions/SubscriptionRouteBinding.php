<?php
namespace App\Subscriptions;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class SubscriptionRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Subscriptions\SubscriptionRepository
     */
    private $subscriptions;

    public function __construct(SubscriptionRepository $subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * @param int $id
     * @return \App\Subscriptions\Subscription|null
     */
    public function find($id)
    {
        return $this->subscriptions->find($id);
    }
}
