<?php
namespace App\Teams;

interface TeamRepository
{
    /**
     * @param int $id
     * @return \App\Teams\Team|null
     */
    public function find($id);
}
