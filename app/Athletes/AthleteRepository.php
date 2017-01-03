<?php
namespace App\Athletes;

use App\Users\User;

interface AthleteRepository
{
    /**
     * @param int $id
     * @return \App\Athletes\Athlete|null
     */
    public function find($id);

    /**
     * @param \App\Users\User $user
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findForUserPaginated(User $user, $limit = 10);

    /**
     * @param \App\Athletes\Athlete $athlete
     */
    public function delete(Athlete $athlete);
}
