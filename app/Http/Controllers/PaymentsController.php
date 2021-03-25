<?php

namespace App\Http\Controllers;

use App\Order;
use Braintree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    public function process(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $tot = $payload['tot'];

        $status = Braintree\Transaction::sale([
            'amount' => $tot,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);
        return response()->json($status);
    }

    public function ajaxRequestPost(Request $request)
    {
        Log::info($request);

        $validated = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_telephone' => 'required',
            'customer_address' => 'required',
            'delivery_date' => 'required',
            'delivery_time' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
        ]);

        Order::create($validated);

        $response = array(
            'status' => 'success',
            'name' => $request->customer_name,
        );
        return response()->json($response);

    }
}
