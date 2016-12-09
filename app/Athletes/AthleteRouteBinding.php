<?php
namespace App\Athletes;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class AthleteRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Athletes\AthleteRepository
     */
    private $athletes;

    public function __construct(AthleteRepository $athletes)
    {
        $this->athletes = $athletes;
    }

    /**
     * @param int $id
     * @return \App\Athletes\Athlete|null
     */
    public function find($id)
    {
        return $this->athletes->find($id);
    }
}
