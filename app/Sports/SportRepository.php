<?php
namespace App\Sports;

interface SportRepository
{
    /**
     * @param int $id
     * @return \App\Sports\Sport|null
     */
    public function find($id);
}
