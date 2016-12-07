<?php
namespace App\Database;

use Illuminate\Support\ServiceProvider;

class ModelFactoryServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->bind(ModelFactory::class, EloquentModelFactory::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            ModelFactory::class,
        ];
    }
}
