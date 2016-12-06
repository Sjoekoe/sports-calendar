<?php
namespace App\Teams;

use Illuminate\Support\ServiceProvider;

class TeamServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(TeamRepository::class, function () {
            return new EloquentTeamRepository(new EloquentTeam());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            TeamRepository::class,
        ];
    }
}
