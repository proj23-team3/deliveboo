<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Add a Query to Api based on user_id
        $userOrderId = $request->get('user_id');

        // Create a Builder instance
        $query = Order::query();
        
        if ($userOrderId) {
            // . Conditionally add a WHERE
            $query->where('user_id', $userOrderId);
        }

        // Set the query with get method inside a variable ant Return it in a response encoded in Json 
        $apiOrders = $query->get();
        
        // return the response
        return response()->json($apiOrders);

    }
}
