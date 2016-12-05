<?php

namespace App\Providers;

use App\Auth\EloquentUserProvider;
use App\Auth\Guard;
use App\Teams\TeamRepository;
use App\Users\UserRepository;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        require '../app/Auth/helpers.php';

        $this->app['auth']->extend('custom', function ($app, $name, array $config) {
            $guard = new Guard($name, $app['auth']->createUserProvider($config['provider']), $app['session.store']);
            $guard->setCookieJar($app['cookie']);
            $guard->setDispatcher($app['events']);
            $guard->setRequest($app->refresh('request', $guard, 'setRequest'));

            return $guard;
        });

        $this->app['auth']->provider('custom', function ($app) {
            return new EloquentUserProvider(
                $app[Hasher::class],
                $app[UserRepository::class],
                $app[TeamRepository::class]
            );
        });

        $this->registerPolicies();
    }

    /**
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }
}
