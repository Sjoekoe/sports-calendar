<?php
namespace App\Accounts\Athletes;

interface AccountAthletes
{
    const TABLE = 'account_athletes';

    /**
     * @return int
     */
    public function id();

    /**
     * @return \App\Athletes\Athlete
     */
    public function athlete();

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
