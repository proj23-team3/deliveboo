<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $restaurants = User::with('categories')->get();
        return view('guest.search', compact('category', 'restaurants'));
    }
}
