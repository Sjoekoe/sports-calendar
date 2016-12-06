<?php
namespace App\Rosters;

interface Roster
{
    const TABLE = 'rosters';

    /**
     * @return int
     */
    public function id();

    /**
     * @return int
     */
    public function limit();

    /**
     * @return string
     */
    public function remark();

    /**
     * @return \App\Types\Type
     */
    public function type();

    /**
     * @return \Carbon\Carbon
     */
    public function start();

    /**
     * @return \Carbon\Carbon
     */
    public function end();

    /**
     * @return \App\Accounts\Account
     */
    public function account();

    /**
     * @return \App\Accommodations\Accommodation
     */
    public function accommodation();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
