<?php
namespace App\Teams;

use App\Accounts\Account;

interface TeamRepository
{
    /**
     * @param int $id
     * @return \App\Teams\Team|null
     */
    public function find($id);

    /**
     * @param \App\Accounts\Account $account
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findByAccountPaginated(Account $account, $limit = 10);

    /**
     * @param \App\Accounts\Account $account
     * @param array $values
     * @return \App\Teams\Team
     */
    public function create(Account $account, array $values);

    /**
     * @param \App\Teams\Team $team
     */
    public function delete(Team $team);
}
