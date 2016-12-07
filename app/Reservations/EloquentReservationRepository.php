<?php
namespace App\Reservations;

class EloquentReservationRepository implements ReservationRepository
{
    /**
     * @var \App\Reservations\EloquentReservation
     */
    private $reservation;

    public function __construct(EloquentReservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * @param int $id
     * @return \App\Reservations\Reservation|null
     */
    public function find($id)
    {
        return $this->reservation
            ->where('id', $id)
            ->first();
    }
}
