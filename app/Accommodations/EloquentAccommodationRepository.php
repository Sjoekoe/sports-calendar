<?php
namespace App\Accommodations;

class EloquentAccommodationRepository implements AccommodationRepository
{
    /**
     * @var \App\Accommodations\EloquentAccommodation
     */
    private $accommodation;

    public function __construct(EloquentAccommodation $accommodation)
    {
        $this->accommodation = $accommodation;
    }

    /**
     * @param int $id
     * @return \App\Accommodations\Accommodation|null
     */
    public function find($id)
    {
        return $this->accommodation
            ->where('id', $id)
            ->first();
    }
}
