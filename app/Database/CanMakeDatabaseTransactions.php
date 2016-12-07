<?php
namespace App\Database;

use Closure;

trait CanMakeDatabaseTransactions
{
    /**
     * @var \App\Database\TransactionManager
     */
    protected $transactionManager;

    public function transaction(Closure $callback)
    {
        return $this->transactionManager->transaction($callback);
    }
}
