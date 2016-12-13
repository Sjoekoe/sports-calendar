<?php
namespace App\Accounts;

interface Account
{
    const TABLE = 'accounts';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function name();

    /**
     * @return string
     */
    public function email();

    /**
     * @return \App\Accommodations\Accommodation[]
     */
    public function accommodations();

    /**
     * @return \App\Teams\Team[]
     */
    public function teams();

    /**
     * @return \App\Types\Type[]
     */
    public function types();

    /**
     * @return string
     */
    public function dateFormat();

    /**
     * @return string
     */
    public function timeFormat();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
