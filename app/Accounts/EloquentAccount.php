<?php
namespace App\Accounts;

use App\Accommodations\EloquentAccommodation;
use App\Accounts\Subscriptions\AccountSubscription;
use App\Models\StandardModel;
use App\Teams\EloquentTeam;
use App\Types\EloquentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EloquentAccount extends Model implements Account
{
    use StandardModel, Notifiable;

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
     * @return string
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return \App\Accommodations\Accommodation[]
     */
    public function accommodations()
    {
        return $this->hasMany(EloquentAccommodation::class, 'account_id', 'id')->get();
    }

    /**
     * @return \App\Teams\Team[]
     */
    public function teams()
    {
        return $this->hasMany(EloquentTeam::class, 'account_id', 'id')->get();
    }

    /**
     * @return \App\Types\Type[]
     */
    public function types()
    {
        return $this->hasMany(EloquentType::class, 'account_id', 'id')->get();
    }

    /**
     * @return string
     */
    public function dateFormat()
    {
        return $this->date_format;
    }

    /**
     * @return string
     */
    public function timeFormat()
    {
        return $this->time_format;
    }

    /**
     * @return bool
     */
    public function isSubscribed()
    {
        return $this->stripe_active;
    }

    /**
     * @return \App\Accounts\Subscriptions\AccountSubscription
     */
    public function subscription()
    {
        return new AccountSubscription($this);
    }
}
