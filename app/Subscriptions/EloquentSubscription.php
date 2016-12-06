<?php
namespace App\Subscriptions;

use App\Athletes\EloquentAthlete;
use App\Models\StandardModel;
use App\Rosters\EloquentRoster;
use Illuminate\Database\Eloquent\Model;

class EloquentSubscription extends Model implements Subscription
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return \App\Rosters\Roster
     */
    public function roster()
    {
        return $this->belongsTo(EloquentRoster::class, 'roster_id', 'id')->first();
    }

    /**
     * @return \App\Athletes\Athlete
     */
    public function athlete()
    {
        return $this->belongsTo(EloquentAthlete::class, 'athlete_id', 'id')->first();
    }
}
