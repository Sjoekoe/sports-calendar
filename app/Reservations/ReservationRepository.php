<?php
namespace App\Reservations;

interface ReservationRepository
{
    /**
     * @param int $id
     * @return \App\Reservations\Reservation|null
     */
    public function find($id);
}
