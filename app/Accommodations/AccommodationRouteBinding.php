<?php
namespace App\Accommodations;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class AccommodationRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Accommodations\AccommodationRepository
     */
    private $accommodations;

    public function __construct(AccommodationRepository $accommodations)
    {
        $this->accommodations = $accommodations;
    }

    /**
     * @param int $id
     * @return \App\Accommodations\Accommodation|null
     */
    public function find($id)
    {
        return $this->accommodations->find($id);
    }
}
