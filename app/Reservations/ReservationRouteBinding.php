<?php
namespace App\Reservations;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class ReservationRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Reservations\ReservationRepository
     */
    private $reservations;

    public function __construct(ReservationRepository $reservations)
    {
        $this->reservations = $reservations;
    }

    /**
     * @param int $id
     * @return \App\Reservations\Reservation|null
     */
    public function find($id)
    {
        return $this->reservations->find($id);
    }
}
