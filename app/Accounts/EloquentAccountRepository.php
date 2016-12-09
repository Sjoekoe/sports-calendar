<?php
namespace App\Accounts;

class EloquentAccountRepository implements AccountRepository
{
    /**
     * @var \App\Accounts\EloquentAccount
     */
    private $account;

    public function __construct(EloquentAccount $account)
    {
        $this->account = $account;
    }

    /**
     * @param int $id
     * @return \App\Accounts\Account|null
     */
    public function find($id)
    {
        return $this->account
            ->where('id', $id)
            ->first();
    }
}
