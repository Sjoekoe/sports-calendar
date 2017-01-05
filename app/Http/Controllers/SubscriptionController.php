<?php
namespace App\Http\Controllers;

use App\Plans\Plan;
use Exception;
use Illuminate\Http\Request;
use Stripe\Customer;

class SubscriptionController extends Controller
{
    public function store(Request $request, Plan $plan)
    {
        try {
            Customer::create([
                'email' => $request->get('stripeEmail'),
                'source' => $request->get('stripeToken'),
                'plan' => $plan->name()
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => $e->getMessage()], 422);
        }

        return 'all done';
    }
}
