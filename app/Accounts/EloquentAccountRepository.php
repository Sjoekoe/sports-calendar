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

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 10)
    {
        return $this->account
            ->orderBy('name')
            ->paginate($limit);
    }

    /**
     * @param \App\Accounts\Account $account
     */
    public function delete(Account $account)
    {
        $account->delete();
    }

    /**
     * @param array $values
     * @return \App\Accounts\Account
     */
    public function create(array $values)
    {
        $account = new EloquentAccount();
        $account->name = $values['name'];
        $account->email = $values['email'];
        $account->date_format = 'd-m-Y';
        $account->time_format = 'H:i';

        $account->save();

        return $account;
    }

    /**
     * @param \App\Accounts\Account $account
     * @param array $values
     * @return \App\Accounts\Account
     */
    public function update(Account $account, array $values)
    {
        $account->name = $values['name'];
        $account->email = $values['email'];

        if (array_key_exists('date_format', $values)) {
            $account->date_format = $values['date_format'];
        }

        if (array_key_exists('time_format', $values)) {
            $account->time_format = $values['time_format'];
        }

        $account->save();

        return $account;
    }

    /**
     * @param \App\Accounts\Account $account
     * @param array $values
     * @return \App\Accounts\Account
     */
    public function subscribe(Account $account, array $values)
    {
        $account->stripe_id = $values['stripe_id'];
        $account->stripe_active = $values['stripe_active'];

        $account->save();

        return $account;
    }
}
