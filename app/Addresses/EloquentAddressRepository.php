<?php
namespace App\Addresses;

class EloquentAddressRepository implements AddressRepository
{
    /**
     * @var \App\Addresses\EloquentAddress
     */
    private $address;

    public function __construct(EloquentAddress $address)
    {
        $this->address = $address;
    }

    /**
     * @param int $id
     * @return \App\Addresses\Address|null
     */
    public function find($id)
    {
        return $this->address
            ->where('id', $id)
            ->first();
    }
}
