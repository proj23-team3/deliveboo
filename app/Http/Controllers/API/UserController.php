<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Add a Query to Api based on restaurant name
        $restaurantName = $request->get('name');

        // Create a Builder instance
        $query = User::query();
        
        if ($restaurantName) {
            // . Conditionally add a WHERE
            $query->where('name', $restaurantName);
        }

        // Return the query and add to it the categories related to that restaurant
        $apiRestaurants = $query->with('categories')->get();
        
        // return the response
        return response()->json($apiRestaurants);
    }
}
