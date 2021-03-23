<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;

class PaymentsController extends Controller
{
    public function process(Request $request )
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $tot = $payload['tot'];
        
        $status = Braintree\Transaction::sale([
        'amount' => $tot,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => True
        ]
        ]);
         return response()->json($status);
    }
}
