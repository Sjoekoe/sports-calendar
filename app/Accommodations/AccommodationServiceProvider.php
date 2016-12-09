<?php
namespace App\Accommodations;

use Illuminate\Support\ServiceProvider;

class AccommodationServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(AccommodationRepository::class, function () {
            return new EloquentAccommodationRepository(new EloquentAccommodation());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            AccommodationRepository::class,
        ];
    }
}
