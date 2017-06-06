<?php
namespace App\Plans;

use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentPlan extends Model implements Plan
{
    use StandardModel;

    /**
     * @var string
     */
    protected $table = self::TABLE;

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function price()
    {
        return $this->price;
    }
}
