<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\{Charge, Customer};

class PurchasesController extends Controller
{
    public function store(Request $request)
    {

        $customer = Customer::create([
            'email' => $request->get('stripeEmail'),
            'source' => $request->get('stripeToken'),

        ]);

        Charge::create([
            'customer' => $customer->id,
            'amount' => '5000',
            'currency' => 'eur',
        ]);

        return 'all done';
    }
}
