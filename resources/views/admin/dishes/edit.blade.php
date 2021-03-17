@extends('layouts.admin')

@section('content')

    <h1>Modifica il Piatto</h1>

    
        <form method="POST" action="{{ route('admin.dishes.update', ['dish' => $dish->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="dish_name" class="col-sm-1-12 col-form-label">Nome Piatto </label>
                <div class="col-sm-1-12">
                    <br> 
                    <input type="text" class="form-control mx-2" name="dish_name" id="dish_name"
                        value="{{ $dish->dish_name }}">
                </div>
            </div>
            <div class="form-group row">

                <label for="dish_ingredients" class="col-sm-1-12 col-form-label">Ingredienti  </label>
                <div class="col-sm-1-12">
                    <br> 
                    <textarea name="dish_ingredients" class="mx-2" id="dish_ingredients" cols="30"
                        rows="10">{{ $dish->dish_ingredients }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="dish_price" class="col-sm-1-12 col-form-label">Prezzo  </label>
                <div class="col-sm-1-12">
                    <br>
                    <input type="number" step=".01 " class="form-control mx-2" name="dish_price" id="dish_price"
                        value="{{ $dish->dish_price }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="form-check">
                    <label class="form-check-label" for="is_visible">
                        <input type="radio" class="form-check-input" name="is_visible" id="is_visible" value="1" checked>
                        Visible
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="is_invisible">
                        <input type="radio" class="form-check-input" name="is_visible" id="is_invisible" value="1">
                        Invisible
                    </label>
                </div>
            </div>

            <div class="form-group row">
                <label for="dish_image"
                    class="col-md-3 col-form-label">{{ __('Scegli un immagine per il tuo Piatto') }}</label>

                <div class="col-md-7">
                    <input type="file" name="dish_image" id="dish_image" class="form-control-file">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> Modifica Piatto </button>
        </form>
    

@endsection

