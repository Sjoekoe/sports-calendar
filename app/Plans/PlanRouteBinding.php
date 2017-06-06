<?php
namespace App\Plans;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class PlanRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Plans\PlanRepository
     */
    private $plans;

    public function __construct(PlanRepository $plans)
    {
        $this->plans = $plans;
    }

    /**
     * @param int|string $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->plans->find($id);
    }
}
