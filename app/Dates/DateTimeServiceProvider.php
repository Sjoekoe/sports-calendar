<?php
namespace App\Dates;

use App\Dates\Validation\AbstractDateRule;
use App\Dates\Validation\AccountDateFormatRule;
use App\Dates\Validation\AfterDateRule;
use App\Dates\Validation\BeforeDateRule;
use App\Validation\ExtendsValidator;
use Illuminate\Support\ServiceProvider;

class DateTimeServiceProvider extends ServiceProvider
{
    use ExtendsValidator;

    /**
     * @var array
     */
    protected $rules = [
        AbstractDateRule::class,
        AccountDateFormatRule::class,
        AfterDateRule::class,
        BeforeDateRule::class,
    ];

    public function register() {}
}
