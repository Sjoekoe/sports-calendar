<?php
namespace App\Providers;

use App\Accommodations\AccommodationRouteBinding;
use App\Accounts\AccountRouteBinding;
use App\Addresses\AddressRouteBinding;
use App\Athletes\AthleteRouteBinding;
use App\Reservations\ReservationRouteBinding;
use App\Rosters\RosterRouteBinding;
use App\Sports\SportRouteBinding;
use App\Subscriptions\SubscriptionRouteBinding;
use App\Teams\TeamRouteBinding;
use App\Types\TypeRouteBinding;
use App\Users\UserRouteBinding;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::bind('accommodation', AccommodationRouteBinding::class);
        Route::bind('account', AccountRouteBinding::class);
        Route::bind('addresses', AddressRouteBinding::class);
        Route::bind('athlete', AthleteRouteBinding::class);
        Route::bind('reservation', ReservationRouteBinding::class);
        Route::bind('roster', RosterRouteBinding::class);
        Route::bind('sport', SportRouteBinding::class);
        Route::bind('subscription', SubscriptionRouteBinding::class);
        Route::bind('team', TeamRouteBinding::class);
        Route::bind('type', TypeRouteBinding::class);
        Route::bind('user', UserRouteBinding::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
