<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;

class PageController extends Controller
{
    public function home()
    {

        $categories = Category::all();
        return view('guest.home', compact('categories'));
    }

    public function restaurant($id)
    {
        $ristorante = User::where('id', $id)->with('dishes')->get();
        return view('guest.rest', compact('ristorante'));
    }

    public function checkout()
    {

        
        return view('guest.payment');
    }
}
