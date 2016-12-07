<?php
namespace App\Sports;

class EloquentSportRepository implements SportRepository
{
    /**
     * @var \App\Sports\EloquentSport
     */
    private $sport;

    public function __construct(EloquentSport $sport)
    {
        $this->sport = $sport;
    }

    /**
     * @param int $id
     * @return \App\Sports\Sport|null
     */
    public function find($id)
    {
        return $this->sport
            ->where('id', $id)
            ->first();
    }
}
