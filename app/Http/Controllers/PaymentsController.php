<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Order;
use Braintree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

        // gestione ordine in base al success della transaction
        $last_order = Order::orderBy('id', 'desc')->first();
        if (!$status->success) {
            $last_order->delete();
        } else {
            $last_order->payment_id = $nonce;
        }

        Log::info($last_order);

        return response()->json($status);
    }

    public function ajaxRequestPost(Request $request)
    {
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

        // Creare l'oggetto mail da inserire nel parametro da passare al markup mailable
        $mail = Order::create($validated);

        Mail::to($request->customer_email)->send(new ContactMail($mail));

        $response = array(
            'status' => 'success',
            'name' => $request->customer_name,
            'delivery_date' => $request->delivery_date,
        );
        return response()->json($response);

    }
}
