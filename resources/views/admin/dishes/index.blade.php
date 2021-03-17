@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.dishes.create') }}" class="btn btn-outline-info my-4">Aggiungi un nuovo piatto</a>
    @foreach ($dishes as $dish)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top"
                src="{{ str_contains($dish->dish_image, 'dishes') ? asset('storage/' . $dish->dish_image) : asset('img/default_dish.svg') }}"
                width="250" alt="Immagine piatto">
            <div class="card-body">
                <h5 class="card-title text-uppercase"><strong>{{ $dish->dish_name }}</strong></h5>
                <div class="mb-4">
                    <small>Ingredienti:</small>
                    <p class="card-text">{{ $dish->dish_ingredients }}</p>
                </div>
                <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-info">Modifica il
                    piatto</a>
                <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-1">Elimina questo piatto</button>
                </form>
            </div>
        </div>
    @endforeach

@endsection
