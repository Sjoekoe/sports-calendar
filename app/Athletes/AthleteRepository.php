<?php
namespace App\Athletes;

interface AthleteRepository
{
    /**
     * @param int $id
     * @return \App\Athletes\Athlete|null
     */
    public function find($id);
}
