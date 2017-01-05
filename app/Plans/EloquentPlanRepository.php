<?php
namespace App\Plans;

class EloquentPlanRepository implements PlanRepository
{
    /**
     * @var \App\Plans\EloquentPlan
     */
    private $plan;

    public function __construct(EloquentPlan $plan)
    {
        $this->plan = $plan;
    }

    /**
     * @param int $id
     * @return \App\Plans\Plan|null
     */
    public function find($id)
    {
        return $this->plan
            ->where('id', $id)
            ->first();
    }

    /**
     * @return \App\Plans\Plan[]
     */
    public function all()
    {
        return $this->plan
            ->all();
    }
}
