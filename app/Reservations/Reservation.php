<?php
namespace App\Reservations;

interface Reservation
{
    const TABLE = 'reservations';

    /**
     * @return int
     */
    public function id();

    /**
     * @return \Carbon\Carbon
     */
    public function start();

    /**
     * @return \Carbon\Carbon
     */
    public function end();

    /**
     * @return \App\Users\User
     */
    public function user();

    /**
     * @return \App\Accommodations\Accommodation
     */
    public function accommodation();

    /**
     * @return string
     */
    public function remarks();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
