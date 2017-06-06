<?php
namespace App\Accounts;

interface AccountRepository
{
    /**
     * @param int $id
     * @return \App\Accounts\Account|null
     */
    public function find($id);

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 10);

    /**
     * @param \App\Accounts\Account $account
     */
    public function delete(Account $account);

    /**
     * @param array $values
     * @return \App\Accounts\Account
     */
    public function create(array $values);

    /**
     * @param \App\Accounts\Account $account
     * @param array $values
     * @return \App\Accounts\Account
     */
    public function update(Account $account, array $values);

    /**
     * @param \App\Accounts\Account $account
     * @param array $values
     * @return \App\Accounts\Account
     */
    public function subscribe(Account $account, array $values);
}
