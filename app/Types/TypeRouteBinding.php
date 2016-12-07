<?php
namespace App\Types;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class TypeRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Types\TypeRepository
     */
    private $types;

    public function __construct(TypeRepository $types)
    {
        $this->types = $types;
    }

    /**
     * @param int $id
     * @return \App\Types\Type|null
     */
    public function find($id)
    {
        return $this->types->find($id);
    }
}
