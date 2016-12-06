<?php
namespace App\Types;

interface Type
{
    const TABLE = 'types';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function name();

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
