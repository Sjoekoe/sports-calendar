<?php
namespace App\Http\Controllers;

use App\Products\Product;
use Illuminate\Http\Request;
use Stripe\{Charge, Customer};

class PurchasesController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $customer = Customer::create([
            'email' => $request->get('stripeEmail'),
            'source' => $request->get('stripeToken'),

        ]);

        Charge::create([
            'customer' => $customer->id,
            'amount' => $product->price(),
            'currency' => 'eur',
        ]);

        return 'all done';
    }
}
