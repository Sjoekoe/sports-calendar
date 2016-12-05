<?php
namespace App\Athletes;

use App\Models\StandardModel;
use App\Users\EloquentUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EloquentAthlete extends Model implements Athlete
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
     * @return \Carbon\Carbon
     */
    public function birthday()
    {
        return Carbon::parse($this->birthday);
    }

    /**
     * @return string
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function phone()
    {
        return $this->phone;
    }

    /**
     * @return \App\Users\User
     */
    public function user()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id')->first();
    }
}
