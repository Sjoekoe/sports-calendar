<?php
namespace App\Addresses;

interface AddressRepository
{
    /**
     * @param int $id
     * @return \App\Addresses\Address|null
     */
    public function find($id);
}
