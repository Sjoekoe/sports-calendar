<?php
namespace App\Addresses;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class AddressRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Addresses\AddressRepository
     */
    private $addresses;

    public function __construct(AddressRepository $addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @param int $id
     * @return \App\Addresses\Address|null
     */
    public function find($id)
    {
        return $this->addresses->find($id);
    }
}
