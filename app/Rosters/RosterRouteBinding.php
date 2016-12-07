<?php
namespace App\Rosters;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class RosterRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Rosters\RosterRepository
     */
    private $rosters;

    public function __construct(RosterRepository $rosters)
    {
        $this->rosters = $rosters;
    }

    /**
     * @param int $id
     * @return \App\Rosters\Roster|null
     */
    public function find($id)
    {
        return $this->rosters->find($id);
    }
}
