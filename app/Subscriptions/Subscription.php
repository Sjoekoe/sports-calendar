<?php
namespace App\Subscriptions;

interface Subscription
{
    const TABLE = 'subscriptions';

    /**
     * @return int
     */
    public function id();

    /**
     * @return \App\Rosters\Roster
     */
    public function roster();

    /**
     * @return \App\Athletes\Athlete
     */
    public function athlete();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
