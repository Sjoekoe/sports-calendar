<?php
namespace App\Rosters;

use Illuminate\Support\ServiceProvider;

class RosterServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(RosterRepository::class, function () {
            return new EloquentRosterRepository(new EloquentRoster());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            RosterRepository::class,
        ];
    }
}
