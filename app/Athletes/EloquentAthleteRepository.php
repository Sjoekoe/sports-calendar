<?php
namespace App\Athletes;

use App\Users\User;
use Carbon\Carbon;

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

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Athletes\Athlete
     */
    public function create(User $user, array $values)
    {
        $athlete = new EloquentAthlete();
        $athlete->user_id = $user->id();
        $athlete->name = $values['name'];
        $athlete->email = array_get($values, 'email');
        $athlete->phone = array_get($values, 'phone');
        $birthDay = Carbon::createFromFormat('d-m-Y', $values['birthday'])->startOfDay();
        $athlete->birthday = $birthDay;

        $athlete->save();

        return $athlete;
    }

    /**
     * @param \App\Athletes\Athlete $athlete
     * @param array $values
     * @return \App\Athletes\Athlete
     */
    public function update(Athlete $athlete, array $values)
    {
        $athlete->name = $values['name'];
        $athlete->email = array_get($values, 'email');
        $athlete->phone = array_get($values, 'phone', '');
        $birthDay = Carbon::createFromFormat('d-m-Y', $values['birthday'])->startOfDay();
        $athlete->birthday = $birthDay;

        $athlete->save();

        return $athlete;
    }
}
