@extends('layouts.admin')

@section('content')

    <h1 class="mt-5 font-weight-bolder">Crea il tuo piatto</h1>


    <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
        @csrf
        <hr>
        <div class="form-group row">
            <label for="dish_name" class="col-form-label col-md-12">Inserisci il nome del tuo piatto</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="dish_name" id="dish_name" placeholder="Nome del piatto">
            </div>
        </div>
        <div class="form-group row">

            <label for="dish_ingredients" class="col-md-12 col-form-label">Inserisci la descrizione con gli ingredienti
                del
                tuo piatto</label>
            <div class="col-md-12">
                <textarea style="resize: none; padding: 10px; min-width: 100%; border: 1px solid lightgrey;"
                    name="dish_ingredients" id="dish_ingredients" cols="50" rows="10"
                    placeholder="Descrivi il tuo piatto..."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="dish_price" class="col-md-12 col-form-label">Inserisci il prezzo di vendita del tuo piatto</label>
            <div class="col-md-4 mb-4">
                <input type="number" step=".01 " class="form-control" name="dish_price" id="dish_price"
                    placeholder="Prezzo in €">
            </div>
        </div>
        <p>Indica se il tuo piatto è attualmente disponibile per l'acquisto</p>
        <div class="form-group row">
            <div class="form-check col-md-2 ml-3">
                <label class="form-check-label" for="is_visible">
                    <input type="radio" class="form-check-input" name="is_visible" id="is_visible" value="1" checked>
                    Disponibile
                </label>
            </div>
            <div class="form-check col-md-2">
                <label class="form-check-label" for="is_invisible">
                    <input type="radio" class="form-check-input" name="is_visible" id="is_invisible" value="1">
                    Esaurito
                </label>
            </div>
        </div>
        <div class="form-group row">
            <label for="dish_image"
                class="col-md-12 col-form-label mt-4 mb-2">{{ __('Inserisci la foto del tuo piatto') }}</label>
            <div class="col-md-5">
                <input type="file" name="dish_image" id="dish_image" class="form-control-file">
            </div>
        </div>
        <button class="btn btn-primary mt-3" type="submit">Aggiungi il tuo piatto!</button>
    </form>


@endsection
