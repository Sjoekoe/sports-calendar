<?php
namespace App\Testing;

use App\Accounts\Account;
use App\Users\User;

trait DefaultIncludes
{
    /**
     * @param \App\Users\User $user
     * @param array $attributes
     * @return array
     */
    public function includedUser(User $user, array $attributes = [])
    {
        return array_merge([
            'id' => $user->id(),
            'name' => $user->name(),
            'email' => $user->email(),
            'phone' => $user->phone(),
            'language' => $user->language(),
            'last_login' => $user->lastLogin()->toIso8601String(),
            'created_at' => $user->createdAt()->toIso8601String(),
            'updated_at' => $user->updatedAt()->toIso8601String(),
        ], $attributes);
    }

    /**
     * @param \App\Accounts\Account $account
     * @param array $attributes
     * @return array
     */
    public function includedAccount(Account $account, array $attributes = [])
    {
        return array_merge([
            'id' => $account->id(),
            'name' => $account->name(),
            'email' => $account->email(),
            'date_format' => $account->dateFormat(),
            'time_format' => $account->timeFormat(),
        ], $attributes);
    }
}
