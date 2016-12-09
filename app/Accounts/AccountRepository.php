<?php
namespace App\Accounts;

interface AccountRepository
{
    /**
     * @param int $id
     * @return \App\Accounts\Account|null
     */
    public function find($id);
}
