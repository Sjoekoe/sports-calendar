<?php
namespace App\Accounts\Sports;

interface AccountSports
{
    const TABLE = 'account_sports';

    /**
     * @return int
     */
    public function id();

    /**
     * @return \App\Sports\Sport
     */
    public function sport();

    /**
     * @return \App\Accounts\Account
     */
    public function account();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
