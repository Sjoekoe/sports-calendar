<?php
namespace App\Rosters;

class EloquentRosterRepository implements RosterRepository
{
    /**
     * @var \App\Rosters\EloquentRoster
     */
    private $roster;

    public function __construct(EloquentRoster $roster)
    {
        $this->roster = $roster;
    }

    /**
     * @param int $id
     * @return \App\Rosters\Roster|null
     */
    public function find($id)
    {
        return $this->roster
            ->where('id', $id)
            ->first();
    }
}
