<?php
namespace App\Products;

class EloquentProductRepository implements ProductRepository
{
    /**
     * @var \App\Products\EloquentProduct
     */
    private $product;

    public function __construct(EloquentProduct $product)
    {
        $this->product = $product;
    }

    /**
     * @return \App\Products\Product[]
     */
    public function all()
    {
        return $this->product
            ->all();
    }

    /**
     * @param int $id
     * @return \App\Products\Product|null
     */
    public function find($id)
    {
        return $this->product
            ->where('id', $id)
            ->first();
    }
}
