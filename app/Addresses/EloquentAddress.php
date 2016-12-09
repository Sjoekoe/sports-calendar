<?php
namespace App\Addresses;

use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentAddress extends Model implements Address
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return string
     */
    public function street()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function addressLine2()
    {
        return $this->address_line_2;
    }

    /**
     * @return string
     */
    public function zip()
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function city()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function state()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function country()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function latitude()
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function longitude()
    {
        return $this->longitude;
    }
}
