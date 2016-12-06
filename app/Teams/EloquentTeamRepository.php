<?php
namespace App\Teams;

class EloquentTeamRepository implements TeamRepository
{
    /**
     * @var \App\Teams\EloquentTeam
     */
    private $team;

    public function __construct(EloquentTeam $team)
    {
        $this->team = $team;
    }

    /**
     * @param int $id
     * @return \App\Teams\Team|null
     */
    public function find($id)
    {
        return $this->team
            ->where('id', $id)
            ->first();
    }
}
