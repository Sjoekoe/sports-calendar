<?php
namespace App\Types;

use App\Accounts\EloquentAccount;
use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentType extends Model implements Type
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return \App\Accounts\Account
     */
    public function account()
    {
        return $this->belongsTo(EloquentAccount::class, 'account_id', 'id')->first();
    }
}
