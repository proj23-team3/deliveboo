<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.home', compact('user'));
    }

    public function stats()
    {
        $user = Auth::user();
        $apId = $user->id;
        // dd($apId);
        
        return view('admin.orders.stats', compact('apId'));
    }
}
