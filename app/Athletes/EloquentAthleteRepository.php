<?php
namespace App\Athletes;

use App\Users\User;

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

    /**
     * @param \App\Users\User $user
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findForUserPaginated(User $user, $limit = 10)
    {
        return $this->athlete
            ->where('user_id', $user->id())
            ->paginate($limit);
    }

    /**
     * @param \App\Athletes\Athlete $athlete
     */
    public function delete(Athlete $athlete)
    {
        $athlete->delete();
    }
}
