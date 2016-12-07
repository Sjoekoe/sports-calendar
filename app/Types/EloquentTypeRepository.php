<?php
namespace App\Types;

class EloquentTypeRepository implements TypeRepository
{
    /**
     * @var \App\Types\EloquentType
     */
    private $type;

    public function __construct(EloquentType $type)
    {
        $this->type = $type;
    }

    /**
     * @param int $id
     * @return \App\Types\Type|null
     */
    public function find($id)
    {
        return $this->type
            ->where('id', $id)
            ->first();
    }
}
