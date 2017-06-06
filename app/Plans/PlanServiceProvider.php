<?php
namespace App\Plans;

use Illuminate\Support\ServiceProvider;

class PlanServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(PlanRepository::class, function () {
            return new EloquentPlanRepository(new EloquentPlan());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            PlanRepository::class,
        ];
    }
}
