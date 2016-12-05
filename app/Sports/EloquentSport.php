<?php
namespace App\Sports;

use App\Models\StandardModel;
use Illuminate\Database\Eloquent\Model;

class EloquentSport extends Model implements Sport
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
}
