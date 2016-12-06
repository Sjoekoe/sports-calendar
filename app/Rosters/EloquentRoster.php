<?php
namespace App\Rosters;

use App\Accommodations\EloquentAccommodation;
use App\Accounts\EloquentAccount;
use App\Models\StandardModel;
use App\Types\EloquentType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EloquentRoster extends Model implements Roster
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return int
     */
    public function limit()
    {
        return $this->limit;
    }

    /**
     * @return string
     */
    public function remark()
    {
        return $this->remark;
    }

    /**
     * @return \App\Types\Type
     */
    public function type()
    {
        return $this->belongsTo(EloquentType::class, 'type_id', 'id')->first();
    }

    /**
     * @return \Carbon\Carbon
     */
    public function start()
    {
        return Carbon::parse($this->start);
    }

    /**
     * @return \Carbon\Carbon
     */
    public function end()
    {
        return Carbon::parse($this->end);
    }

    /**
     * @return \App\Accounts\Account
     */
    public function account()
    {
        return $this->belongsTo(EloquentAccount::class, 'account_id', 'id')->first();
    }

    /**
     * @return \App\Accommodations\Accommodation
     */
    public function accommodation()
    {
        return $this->belongsTo(EloquentAccommodation::class, 'accommodation_id', 'id')->first();
    }
}
