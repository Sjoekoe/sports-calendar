<?php
namespace App\Athletes;

class EloquentAthleteRepository implements AthleteRepository
{
    /**
     * @var \App\Athletes\EloquentAthlete
     */
    private $athlete;

    public function __construct(EloquentAthlete $athlete)
    {
        $this->athlete = $athlete;
    }

    /**
     * @param int $id
     * @return \App\Athletes\Athlete|null
     */
    public function find($id)
    {
        return $this->athlete
            ->where('id', $id)
            ->first();
    }
}
