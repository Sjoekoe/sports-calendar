<?php
namespace App\Types;

interface TypeRepository
{
    /**
     * @param int $id
     * @return \App\Types\Type|null
     */
    public function find($id);
}
