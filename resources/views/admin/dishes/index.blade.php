@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary my-4">Aggiungi un nuovo piatto</a>
        <div class="row">
            @foreach ($dishes as $dish)
                <div class="col-md-6 mb-5">
                    <div class="card">
                        <div class="image_wrapper">
                            <img class="card-img-top dish_image"
                                src="{{ str_contains($dish->dish_image, 'dishes') ? asset('storage/' . $dish->dish_image) : asset('img/default_dish.svg') }}"
                                alt="Immagine piatto">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-uppercase"><strong>{{ $dish->dish_name }}</strong></h5>
                            <div class="mb-4">
                                <small>Ingredienti:</small>
                                <p class="card-text">{{ $dish->dish_ingredients }}</p>
                            </div>
                            <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}"
                                class="btn btn-primary mr-2 mt-2">Modifica il
                                piatto</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger mr-2 mt-2" data-toggle="modal"
                                data-target="#delete-{{ $dish->id }}">
                                Elimina questo piatto
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete-{{ $dish->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Vuoi cancellare : {{ $dish->dish_name }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mt-1">Elimina questo piatto</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
