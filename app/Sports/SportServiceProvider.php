<?php
namespace App\Sports;

use Illuminate\Support\ServiceProvider;

class SportServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(SportRepository::class, function () {
            return new EloquentSportRepository(new EloquentSport());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            SportRepository::class,
        ];
    }
}
