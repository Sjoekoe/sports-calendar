<?php
namespace App\Rosters;

interface RosterRepository
{
    /**
     * @param int $id
     * @return \App\Rosters\Roster|null
     */
    public function find($id);
}
