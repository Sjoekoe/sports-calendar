<?php
namespace App\Reservations;

use App\Accommodations\EloquentAccommodation;
use App\Models\StandardModel;
use App\Users\EloquentUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EloquentReservation extends Model implements Reservation
{
    use StandardModel;

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
     * @return \App\Users\User
     */
    public function user()
    {
        return $this->belongsTo(EloquentUser::class, 'user_id', 'id')->first();
    }

    /**
     * @return \App\Accommodations\Accommodation
     */
    public function accommodation()
    {
        return $this->belongsTo(EloquentAccommodation::class, 'accommodation_id', 'id')->get();
    }

    /**
     * @return string
     */
    public function remarks()
    {
        return nl2br($this->remarks);
    }
}
