<?php
namespace App\Accounts;

use App\Accommodations\EloquentAccommodation;
use App\Models\StandardModel;
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
}
