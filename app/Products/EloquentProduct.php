<?php
namespace App\Products;

use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentProduct extends Model implements Product
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
        return $this->description;
    }

    /**
     * @return int
     */
    public function price()
    {
        return $this->price;
    }
}
