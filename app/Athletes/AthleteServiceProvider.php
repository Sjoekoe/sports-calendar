<?php
namespace App\Athletes;

use Illuminate\Support\ServiceProvider;

class AthleteServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(AthleteRepository::class, function () {
            return new EloquentAthleteRepository(new EloquentAthlete());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            AthleteRepository::class,
        ];
    }
}
