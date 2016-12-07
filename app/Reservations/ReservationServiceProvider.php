<?php
namespace App\Reservations;

use Illuminate\Support\ServiceProvider;

class ReservationServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(ReservationRepository::class, function () {
            return new EloquentReservationRepository(new EloquentReservation());
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            ReservationRepository::class,
        ];
    }
}
