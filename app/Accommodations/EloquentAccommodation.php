<?php
namespace App\Accommodations;

use App\Accounts\EloquentAccount;
use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentAccommodation extends Model implements Accommodation
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
     * @return string
     */
    public function description()
    {
        return nl2br($this->description);
    }

    /**
     * @return \App\Accounts\Account
     */
    public function account()
    {
        return $this->belongsTo(EloquentAccount::class, 'account_id', 'id')->first();
    }
}
