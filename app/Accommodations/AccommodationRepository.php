<?php
namespace App\Accommodations;

interface AccommodationRepository
{
    /**
     * @param int $id
     * @return \App\Accommodations\Accommodation|null
     */
    public function find($id);
}
