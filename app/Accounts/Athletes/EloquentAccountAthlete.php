<?php
namespace App\Accounts\Athletes;

use App\Accounts\EloquentAccount;
use App\Athletes\EloquentAthlete;
use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentAccountAthlete extends Model implements AccountAthletes
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return \App\Athletes\Athlete
     */
    public function athlete()
    {
        return $this->belongsTo(EloquentAthlete::class, 'athlete_id', 'id')->first();
    }

    /**
     * @return \App\Accounts\Account
     */
    public function account()
    {
        return $this->belongsTo(EloquentAccount::class, 'account_id', 'id')->first();
    }
}
