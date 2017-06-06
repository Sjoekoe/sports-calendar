<?php
namespace App\Plans;

interface PlanRepository
{
    /**
     * @param int $id
     * @return \App\Plans\Plan|null
     */
    public function find($id);

    /**
     * @return \App\Plans\Plan[]
     */
    public function all();
}
