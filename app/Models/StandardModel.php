<?php
namespace App\Models;

use Carbon\Carbon;

trait StandardModel
{
    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt()
    {
        return Carbon::parse($this->created_at);
    }

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt()
    {
        return Carbon::parse($this->updated_at);
    }
}
