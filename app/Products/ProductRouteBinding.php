<?php
namespace App\Products;

use App\Http\AbstractRouteBinding;
use App\Http\RouteBinding;

class ProductRouteBinding extends AbstractRouteBinding implements RouteBinding
{
    /**
     * @var \App\Products\ProductRepository
     */
    private $products;

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    /**
     * @param int|string $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->products->find($id);
    }
}
