<?php
namespace App\Teams;

use App\Accounts\EloquentAccount;
use App\Models\StandardModel;
use App\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;

class EloquentTeam extends Model implements Team
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return \App\Users\User
     */
    public function user()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id')->first();
    }

    /**
     * @return \App\Accounts\Account
     */
    public function account()
    {
        return $this->belongsTo(EloquentAccount::class, 'account_id', 'id')->first();
    }
}
