<?php
namespace App\Accounts\Sports;

use App\Accounts\EloquentAccount;
use App\Models\StandardModel;
use App\Sports\EloquentSport;
use Illuminate\Database\Eloquent\Model;

class EloquentAccountSports extends Model implements AccountSports
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return \App\Sports\Sport
     */
    public function sport()
    {
        return $this->belongsTo(EloquentSport::class, 'sport_id', 'id')->first();
    }

    /**
     * @return \App\Accounts\Account
     */
    public function account()
    {
        return $this->belongsTo(EloquentAccount::class, 'account_id',' id')->first();
    }
}
