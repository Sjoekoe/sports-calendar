<?php
namespace App\Teams;

use App\Accounts\Account;

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

    /**
     * @param \App\Accounts\Account $account
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findByAccountPaginated(Account $account, $limit = 10)
    {
        return $this->team
            ->where('account_id', $account->id())
            ->paginate($limit);
    }

    /**
     * @param \App\Accounts\Account $account
     * @param array $values
     * @return \App\Teams\Team
     */
    public function create(Account $account, array $values)
    {
        $team = new EloquentTeam();
        $team->account_id = $account->id();
        $team->user_id = $values['user_id'];

        $team->save();

        return $team;
    }

    /**
     * @param \App\Teams\Team $team
     */
    public function delete(Team $team)
    {
        $team->delete();
    }
}
