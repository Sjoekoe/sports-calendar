<?php
namespace App\Users;

use App\Models\StandardModel;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EloquentUser extends Authenticatable implements User
{
    use Notifiable, StandardModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
     * @return string
     */
    public function rememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @return string
     */
    public function password()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function phone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function language()
    {
        return $this->language;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function lastLogin()
    {
        return $this->last_login ? Carbon::parse($this->last_login) : null;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }
}
