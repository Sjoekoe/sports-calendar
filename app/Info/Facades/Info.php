<?php
namespace App\Info\Facades;

use Illuminate\Support\Facades\Facade;

class Info extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \App\Info\Info::class;
    }
}
