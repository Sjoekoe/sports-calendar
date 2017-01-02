<?php
namespace App\Testing;

use App\Accounts\Account;
use App\Users\User;
use Carbon\Carbon;

trait CreatesModels
{
    /**
     * @param array $attributes
     * @return \App\Users\User
     */
    public function createUser(array $attributes = [])
    {
        return $this->modelFactory->create(User::class, array_merge([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'last_login' => Carbon::now(),
            'phone' => '',
            'language' => 'nl'
        ], $attributes));
    }

    /**
     * @param array $attributes
     * @return \App\Accounts\Account
     */
    public function createAccount(array $attributes = [])
    {
        return $this->modelFactory->create(Account::class, array_merge([
            'name' => 'Foo Account',
            'email' => 'account@foo.com',
            'date_format' => 'd-m-Y',
            'time_format' => 'H:i'
        ], $attributes));
    }
}
