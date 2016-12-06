<?php
namespace App\Users;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(UserRepository::class, function () {
            return new EloquentUserRepository(new EloquentUser());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            UserRepository::class,
        ];
    }
}
