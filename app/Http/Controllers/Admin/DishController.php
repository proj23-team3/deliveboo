<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated_data = $request->validate([
            'dish_name' => 'required',
            'dish_ingredients' => 'required',
            'dish_price' => 'required',
            'is_visible' => 'required',
            'dish_image' => 'image | max:500',
        ]);

        //verifica se viene passato l'input file
        if (!empty($request->dish_image)) {
            $dish_image = Storage::disk('public')->put('dishes', $request->dish_image);
            $validated_data['dish_image'] = $dish_image;
        } else {
            // assegna l'img di default
            $dish_image = asset('img/default_dish.svg');
            $validated_data['dish_image'] = $dish_image;
        }

        $new_dish = new Dish($validated_data);
        $new_dish->user_id = Auth::id();
        $new_dish->save();

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        // return view('admin.dishes.show',compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $validated_data = $request->validate([
            'dish_name' => 'required',
            'dish_ingredients' => 'required',
            'dish_price' => 'required',
            'is_visible' => 'required',
            'dish_image' => 'image | max:500',
        ]);

        //verifica se viene passato l'input file
        if (!empty($request->dish_image)) {
            $dish_image = Storage::disk('public')->put('dishes', $request->dish_image);
            $validated_data['dish_image'] = $dish_image;
        }
        $dish->update($validated_data);

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}
