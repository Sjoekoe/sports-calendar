<?php
namespace App\Http\Controllers;

use App\Products\ProductRepository;

class HomeController extends Controller
{
    /**
     * @var \App\Products\ProductRepository
     */
    private $products;

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    public function index()
    {
        $products = $this->products->all();

        return view('home.index', compact('products'));
    }
}
