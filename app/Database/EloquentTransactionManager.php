<?php
namespace App\Database;

use Closure;
use DB;
use Exception;

class EloquentTransactionManager implements TransactionManager
{
    /**
     * @param \Closure $callback
     * @return mixed
     * @throws \Exception
     */
    public function transaction(Closure $callback)
    {
        DB::beginTransaction();

        try {
            $result = $callback;
            DB::commit();

            return $result;
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
