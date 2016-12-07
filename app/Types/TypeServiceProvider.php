<?php
namespace App\Types;

use Illuminate\Support\ServiceProvider;

class TypeServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(TypeRepository::class, function () {
            return new EloquentTypeRepository(new EloquentType());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            TypeRepository::class,
        ];
    }
}
