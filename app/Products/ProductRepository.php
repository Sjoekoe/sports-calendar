<?php
namespace App\Products;

interface ProductRepository
{
    /**
     * @return \App\Products\Product[]
     */
    public function all();

    /**
     * @param int $id
     * @return \App\Products\Product|null
     */
    public function find($id);
}
