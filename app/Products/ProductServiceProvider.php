<?php
namespace App\Products;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(ProductRepository::class, function () {
            return new EloquentProductRepository(new EloquentProduct());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            ProductRepository::class,
        ];
    }
}
