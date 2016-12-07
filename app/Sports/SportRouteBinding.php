<?php
namespace App\Sports;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class SportRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Sports\SportRepository
     */
    private $sports;

    public function __construct(SportRepository $sports)
    {
        $this->sports = $sports;
    }

    /**
     * @param int $id
     * @return \App\Sports\Sport|null
     */
    public function find($id)
    {
        return $this->sports->find($id);
    }
}
